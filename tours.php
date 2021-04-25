<?php 
	include "action.php";

	if (isset($_GET['submit_search'])){
		$params = $_GET;
		array_walk($params, "clear_input");
		if (isset($params['rating'])) $params['rating'] = array_flip($params['rating']);
		filter_tours($params);
		// var_dump($current_tours);
	}
	if (isset($_POST['submit_sort'])){
		$sort_property = $_POST['sort_by'];
		$is_reverse = isset($_POST['is_reverse']);
		// var_dump($current_tours);
		//echo "<br><br>";
		sort_tours($sort_property, $is_reverse);
		// var_dump($current_tours);
	}  
	include "header.php";
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">Traveller</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
          <li class="nav-item active"><a href="tours.php" class="nav-link">Tours</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
        </ul>
		<button class="btn btn-primary" data-toggle="modal" data-target="#sign-up-modal">Sign Up</button>
      </div>
    </div>
  </nav>

  <?php include "modal.php";?>

<div class="hero-wrap banner tours-banner pb-3">
      <div class="overlay"></div>
      <div class="container pb-3">
        <div class="row tours-banner__content no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs" data-scrollax="properties: { translateX: '-30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span>Tours</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateX: '30%', opacity: 1.6 }">Tours</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
        	<div class="col-lg-3 sidebar">
                <div class="sidebar-wrap bg-light" data-aos="fade-up">
                    <h3 class="heading mb-4">Sort by:</h3>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="fields">
                    <div class="form-group">
		                <div class="select-wrap one-third">
	                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                    <select name="sort_by" id="" class="form-control" placeholder="">
	                      <option <?= (!empty($sort_property) && $sort_property == 'name') ? 'selected' : '' ?> value="name">Name</option>
	                      <option <?= (!empty($sort_property) && $sort_property == 'leaving') ? 'selected' : '' ?> value="leaving">Leaving date</option>
	                      <option <?= (!empty($sort_property) && $sort_property == 'arriving') ? 'selected' : '' ?> value="arriving">Arriving date</option>
	                      <option <?= (!empty($sort_property) && $sort_property == 'duration') ? 'selected' : '' ?> value="duration">Duration</option>
	                      <option <?= (!empty($sort_property) && $sort_property == 'price') ? 'selected' : '' ?> value="price">Price</option>
                          <option <?= (!empty($sort_property) && $sort_property == 'seats') ? 'selected' : '' ?> value="seats">Seats</option>
	                    </select>
	                  </div>
                    </div>
                    <div class="form-check my-2">
						<input <?= (!empty($is_reverse)) ? 'checked' : '' ?> name='is_reverse' type="checkbox" class="form-check-input" id="is_reverse">
						<label class="form-check-label" for="is_reverse">
                            Reverse sort
						</label>
					</div>
                    <div class="form-group">
		                <input type="submit" name='submit_sort' value="Sort" class="btn btn-primary py-3 px-5">
		              </div>
                    </div>
                </form>
                </div>
        		<div class="sidebar-wrap bg-light ftco-animate" data-aos="fade-up">
        			<h3 class="heading mb-4">Find Tours</h3>
        			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
        				<div class="fields">
		              <div class="form-group">
		                <input value="<?= empty($params['filter_text']) ? '' : $params['filter_text'] ?>" type="text" name='filter_text' class="form-control" placeholder="Search for ...">
                    </div>
		              <div class="form-group">
		                <input value="<?= empty($params['min_date']) ? '' : $params['min_date'] ?>" type="text" name='min_date' id="checkin_date" class="form-control" placeholder="Date from">
		              </div>
		              <div class="form-group">
		                <input value="<?= empty($params['max_date']) ? '' : $params['max_date'] ?>" type="text" name='max_date' id="checkin_date" class="form-control" placeholder="Date to">
		              </div>
		              <div class="form-group">
                      <div class="range-slider">
		              		<span>
								<input value="<?= empty($params['min_price']) ? '' : $params['min_price'] ?>" name='min_price' id='min_price_input' onchange="min_price_range.value = min_price_input.value" type="number" value="1000" min="<?= $min_price ?>" max="<?= $max_price ?>"/>	-
								<input value="<?= empty($params['max_price']) ? '' : $params['max_price'] ?>" name='max_price' id='max_price_input' onchange="max_price_range.value = max_price_input.value" type="number" value="5000" min="<?= $min_price ?>" max="<?= $max_price ?>"/>
							</span>
							<input value="<?= empty($params['min_price']) ? '' : $params['min_price'] ?>" id='min_price_range' oninput="min_price_input.value = min_price_range.value" value="" min="<?= $min_price ?>" max="<?= $max_price ?>" step="1" type="range"/>
							<input value="<?= empty($params['max_price']) ? '' : $params['max_price'] ?>" id='max_price_range' oninput="max_price_input.value = max_price_range.value" value="" min="<?= $min_price ?>" max="<?= $max_price ?>" step="1" type="range"/>
						</div>
		              </div>
                      <h3 class="heading mb-4">Star Rating</h3>
                              <div class="form-check">
							    <input value='5' name='rating[]' <?= (isset($params['rating'][5])) ? 'checked' : '' ?> type="checkbox" class="form-check-input" id="rating5">
								<label class="form-check-label" for="rating5">
									<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
								</label>
							  </div>
							  <div class="form-check">
						      <input value='4' name='rating[]' <?= (isset($params['rating'][4])) ? 'checked' : '' ?> type="checkbox" class="form-check-input" id="rating4">
						      <label class="form-check-label" for="rating4">
						    	   <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
						      </label>
							  </div>
							  <div class="form-check">
						      <input value='3' name='rating[]' <?= (isset($params['rating'][3])) ? 'checked' : '' ?> type="checkbox" class="form-check-input" id="rating3">
						      <label class="form-check-label" for="rating3">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
						     </label>
							  </div>
							  <div class="form-check">
							    <input value='2' name='rating[]' <?= (isset($params['rating'][2])) ? 'checked' : '' ?> type="checkbox" class="form-check-input" id="erating2">
						      <label class="form-check-label" for="rating2">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
						      </label>
							  </div>
							  <div class="form-check">
						      <input value='1' name='rating[]' <?= (isset($params['rating'][1])) ? 'checked' : '' ?> type="checkbox" class="form-check-input" id="rating1">
						      <label class="form-check-label" for="rating1">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							    </label>
							  </div>
		              <div class="form-group">
		                <input type="submit" name='submit_search' value="Go" class="btn btn-primary py-3 px-5">
		              </div>
		            </div>
	            </form>
        		</div>
        		
          </div>
          <div class="col-lg-9">
          	<div class="row">
					<?php print_tours(['<div class="col-md-4 d-flex" data-aos="zoom-in-up">', '</div>'])?>
          	</div>
          	<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
          </div> 
        </div>
      </div>
    </section> 

<?php include "footer.php"; ?>