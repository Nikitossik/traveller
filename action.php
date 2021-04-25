<?php 
    include "db.php";
    $min_price = min(array_column($tours, 'price'));
    $max_price = max(array_column($tours, 'price'));

    $min_days = min(array_column($tours, 'duration'));
    $max_days = max(array_column($tours, 'duration'));

    $current_tours = $tours;

    function filter_tours($params){
        global $tours, $current_tours;
        $result = [];

        $filtered_by_text = array_keys(filter_text($tours, $params['filter_text']));
        $filtered_by_dates = array_keys(filter_date($tours, $params['min_date'], $params['max_date']));
        $filtered_by_prices = array_keys(filter_price($tours, $params['min_price'], $params['max_price']));
        if (isset($params['rating'])) $filtered_by_rates = array_keys(filter_rating($tours, $params['rating']));
        else $filtered_by_rates = array_keys($tours);
        // echo "<br>";
        // print_r($filtered_by_text);
        // echo "<br>";
        // echo "<br>";
        // print_r($filtered_by_dates);
        // echo "<br>";
        // echo "<br>";
        // print_r($filtered_by_prices);
        // echo "<br>";
        // echo "<br>";
        // print_r($filtered_by_rates);
        // echo "<br>";

        $result = array_intersect(array_keys($tours), $filtered_by_text, $filtered_by_dates, $filtered_by_prices, $filtered_by_rates);

        $current_tours = array_intersect_key($tours, $result);
    }

    function filter_text($tours, $filter_text){
        return array_filter($tours, function($tour) use ($filter_text){
            if (
                stripos($tour['name'], $filter_text) !== false ||
                stripos($tour['description'], $filter_text)!== false || 
                empty($filter_text)
            ) return true;
            else foreach ($tour['points'] as $k => $v) return stripos ($v, $filter_text) !== false;
        });
    }

    function filter_date($tours, $min_date, $max_date){
        return array_filter($tours, function($tour) use ($min_date, $max_date){
            $tour_min_date = strtotime($tour['leaving']);
            $tour_max_date = strtotime($tour['arriving']);
            $user_min_date = strtotime($min_date);
            $user_max_date = strtotime($max_date);
            if (empty($user_min_date) && empty($user_max_date)) return true;
            elseif (empty($user_min_date)) return $user_max_date <= $tour_max_date;
            elseif (empty($user_max_date)) return $user_min_date >= $tour_min_date;
            else{
                if ($user_min_date > $user_max_date) return false;
                else return $user_min_date >= $tour_min_date && $user_max_date <= $tour_max_date;
            }
        });
    }

    
    function filter_price($tours, &$min_price, &$max_price){
        return array_filter($tours, function($tour) use (&$min_price, &$max_price){
            $tour_price = $tour["price"];
            if (isset($tour["is_hot"])) $tour_price = $tour["price"] - ($tour["price"] * $tour["discount"]);
            if ($tour_price >= $min_price && $tour_price <= $max_price) return true;
            return false;
        });
    }

    function filter_rating($tours, $rating_array){
        return array_filter($tours, function($tour) use ($rating_array){
            return array_key_exists($tour['rating'], $rating_array);
        }
    );
    }

    function filter_hot($tours){
        return array_filter($tours, function($tour){
            if (isset($tour['is_hot'])) return true;
            return false;
        });
       }

   function clear_input($data)
   {
       if (!is_array($data)) return htmlspecialchars(stripslashes(trim($data)));
   }

   

   
   function print_tours($wrap){
    global $current_tours, $tours;

    if (empty($current_tours)){
        echo "<div class='col-12 text-center pb-5'><h2 class='text-danger'>No matching results found...</h2>";
        echo "<h3 class='mt-4 text-danger'>Let's see what we can offer to you:</h3></div>";
        $current_tours = $tours;
        array_walk($current_tours, "generate_tour_html", $wrap);
    }
    else{
        array_walk($current_tours, "generate_tour_html", $wrap);
    }

   }

   function print_only_hot_tours($wrap){
    global $tours;
    $hot_tours = filter_hot($tours);
    array_walk($hot_tours, "generate_tour_html", $wrap);
   }

   function generate_tour_html($tour, $key, $wrap){

       $html = $wrap[0];

        $html.='
        <div class="destination">
        <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image:url(' . $tour['image_path'] . ')">
            <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-search2"></span>
            </div>
        </a>';

        $html.='
        <div class="text p-3">
        <div class="d-flex info">
            <div class="one">
                <h3 class="tour-name">
                    <a href="#">' . cut_text($tour['name'], 20) . '</a>
                </h3>
                <p class="rate">';

        for($i = 0; $i < (int)$tour['rating']; $i++) $html.='<i class="icon-star"></i>';
        for($i = 0; $i < (5 - (int)$tour['rating']); $i++) $html.='<i class="icon-star-o"></i>';

        $html.='<br><span>8 Rating</span>
                </p>
            </div>
            <div class="two">
                <span class="price' . (isset($tour['is_hot']) ? " discount" : "") . '">' . $tour['price'] .' €</span>';
            if(isset($tour['is_hot'])){ 
                $d_price = floor($tour['price'] - $tour['price'] * $tour['discount']);
                $disc = $tour['discount'] * 100;
                $html.="<span class='price'> - $disc % $d_price €</span>";
            } 


        $html.='</div>
        </div>
        <div class="additional">
            <p class="description">' . cut_text($tour['description'], 50) . '</p>
            <p><span>' . $tour['leaving'] .'</span> - <span>' . $tour['arriving'] .'</span></p>
            <p><span>' . $tour['duration'] .' days</span>, <span>' . $tour['seats'] .' seats</span></p>
        </div>
        <hr>
        <p class="bottom-area d-flex">
            <span><i class="icon-map-o"></i></span> 
            <span class="ml-auto"><a href="#">Discover</a></span>
        </p>
    </div></div>';

    $html.=$wrap[1];

    echo $html;
}

   

    function cut_text($text, $length){
        if (strlen($text) > $length){
            $result =  substr($text, 0, $length);
            $result = rtrim($result, "!,.-");
            $result = substr($result, 0, strrpos($result, ' '))."...";
            return $result;
        }
        return $text;
    }

    function set_mode_returns($reverse){
        if ($reverse) return [1,0,-1];
        else return [-1, 0, 1];
    }

    function sort_tours($prop, $reverse){
        $returns = set_mode_returns($reverse);
        call_user_func($prop, $returns);
    }

    function name($returns){
        global $current_tours;
        uasort($current_tours, function($a, $b) use ($returns){
            if ($a['name'] == $b['name']) return $returns[1];
            else return $a['name'] < $b['name'] ? $returns[0] : $returns[2];
        });
    }
    
    function leaving($returns){
        global $current_tours;
        uasort($current_tours, function($a, $b) use ($returns){
            $a_date = strtotime($a['leaving']);
            $b_date = strtotime($b['leaving']);
            if ($a_date == $b_date) return $returns[1];
            else return $a_date < $b_date ? $returns[0] : $returns[2];
        });
    }

    function arriving($returns){
        global $current_tours;
        uasort($current_tours, function($a, $b) use ($returns){
            $a_date = strtotime($a['arriving']);
            $b_date = strtotime($b['arriving']);
            if ($a_date == $b_date) return $returns[1];
            else return $a_date < $b_date ? $returns[0] : $returns[2];
        });
    }

    function duration($returns){
        global $current_tours;
        uasort($current_tours, function($a, $b) use ($returns){
            if ($a['duration'] == $b['duration']) return $returns[1];
            else return $a['duration'] < $b['duration'] ? $returns[0] : $returns[2];
        });
    }

    function price($returns){
        global $current_tours;
        uasort($current_tours, function($a, $b) use ($returns){
            $a_price = $a["price"];
            $b_price = $b["price"];

            if (isset($a["is_hot"])) $a_price = $a["price"] - ($a["price"] * $a["discount"]);
            if (isset($b["is_hot"])) $b_price = $b["price"] - ($b["price"] * $b["discount"]);
            if ($a_price == $b_price) return $returns[1];
            else return $a_price < $b_price ? $returns[0] : $returns[2];
        });
    }

    function seats($returns){
        global $current_tours;
        uasort($current_tours, function($a, $b) use ($returns){
            if ($a['seats'] == $b['seats']) return $returns[1];
            else return $a['seats'] < $b['seats'] ? $returns[0] : $returns[2];
        });
    }

    function check_autorize($log)
    {
        global $users;
        return array_key_exists($log, $users);
    }

    function check_admin($log, $pass)
    {
        global $users;
        return array_key_exists($log, $users) && $pass == $users['admin'];
    }

    function check_log($log)
    {
        return $log == "admin";
    }