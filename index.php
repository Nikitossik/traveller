<?php 
	  include "action.php";
    $greeting = '';
    if (isset($_POST["sign_in_submit"])) {
      $login = $_POST["login"];
      $password = $_POST["pass"];
      if (check_autorize($login)) {
        $greeting = "<h2 class='greeting text-center my-3' data-scrollax='properties: { translateY: \"100%\", opacity: 1.6 }'>Hello, $login</h2>";
        if (check_admin($login, $password)) header("Location: report.php?login=admin");
      } else {
        $greeting = "<h2 class='greeting text-center my-3' data-scrollax='properties: { translateY: \"100%\", opacity: 1.6 }'>Autorize error</h2>";
      }
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
          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
          <li class="nav-item"><a href="tours.php" class="nav-link">Tours</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
        </ul>
        <button class="btn btn-primary" data-toggle="modal" data-target="#sign-up-modal">Sign Up</button>
      </div>
    </div>
  </nav>

  <?php include "modal.php";?>

<div class="hero-wrap banner home-banner pb-3">
      <div class="overlay"></div>
      <div class="container pb-3">
        <div class="row home-banner__content slider-text no-gutters align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="container-fluid">
            <h1 class="mb-4 home-banner__title" data-scrollax="properties: { translateX: '-30%', opacity: 1.6 }"><strong>Travel and explore<br></strong></h1>
            <p class="" data-scrollax="properties: { translateX: '30%', opacity: 1.6 }">We will help you to get once in a lifetime experience</p>
			  
			<form action="tours.php" method="GET">
                <div class="form-row fields sidebar-wrap none">
					<div class="row col-lg-12 col-sm-6 col-12">
                    <div class="form-group col-lg-3 col-12">
                        <input class="form-control" name='filter_text' type="text" placeholder="Search for ...">
                    </div>
                    <div class="form-group col-lg-3 col-12">
                        <input class="form-control" name='min_date' type="text" id="checkin_date" placeholder="Date from">
                    </div>
                    <div class="form-group col-lg-3 col-12">
                        <input class="form-control" name='max_date' type="text" id="checkout_date"  placeholder="Date to">
                    </div>
					<div class="form-group col-lg-3 col-12 ">
		              	<div class="range-slider">
		              		<span>
								<input name='min_price' id='min_price_input' onchange="min_price_range.value = min_price_input.value" type="number" value="1000" min="<?= $min_price ?>" max="<?= $max_price ?>"/>	-
								<input name='max_price' id='max_price_input' onchange="max_price_range.value = max_price_input.value" type="number" value="5000" min="<?= $min_price ?>" max="<?= $max_price ?>"/>
							</span>
							<input id='min_price_range' oninput="min_price_input.value = min_price_range.value" value="1000" min="<?= $min_price ?>" max="<?= $max_price ?>" step="1" type="range"/>
							<input id='max_price_range' oninput="max_price_input.value = max_price_range.value" value="5000" min="<?= $min_price ?>" max="<?= $max_price ?>" step="1" type="range"/>
						</div>
		              </div>
					  </div>
					
					<div class="col-12 col-sm-6 col-lg-12">
					<h3 class="heading mb-4 text-center">Star Rating</h3>
					<div class="container-fluid form-group d-flex justify-content-center align-items-center flex-lg-row flex-column">
								<div class="form-check mx-2">
							    <input value='5' name='rating[]' type="checkbox" class="form-check-input" id="rating5">
								<label class="form-check-label" for="rating5">
									<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
								</label>
							  </div>
							  <div class="form-check mx-2">
						      <input value='4' name='rating[]' type="checkbox" class="form-check-input" id="rating4">
						      <label class="form-check-label" for="rating4">
						    	   <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
						      </label>
							  </div>
							  <div class="form-check mx-2">
						      <input value='3' name='rating[]' type="checkbox" class="form-check-input" id="rating3">
						      <label class="form-check-label" for="rating3">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
						     </label>
							  </div>
							  <div class="form-check mx-2">
							    <input value='2' name='rating[]' type="checkbox" class="form-check-input" id="erating2">
						      <label class="form-check-label" for="rating2">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
						      </label>
							  </div>
							  <div class="form-check mx-2">
						      <input value='1' name='rating[]' type="checkbox" class="form-check-input" id="rating1">
						      <label class="form-check-label" for="rating1">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							    </label>
							  </div>
							  </div>
						</div>
					<div class="form-group col-lg-2 col-12">
						<input class='form-control btn btn-primary' type='submit' name='submit_search' value='Go'>
                    </div>
					</div>
              </form>
              <?php echo $greeting;  ?>
              </div>
        </div>
      </div>
    </div>

    <section class="ftco-section services-section special-bg" id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-6 d-flex align-self-stretch" data-aos="fade-down-right">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Best Price Guarantee</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-lg-3 col-sm-6 d-flex align-self-stretche" data-aos="fade-down">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-like"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Travellers Love Us</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>    
          </div>
          <div class="col-lg-3 col-sm-6 d-flex align-self-stretch" data-aos="fade-down">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-detective"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Best Travel Agent</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-lg-3 col-sm-6 d-flex align-self-stretch" data-aos="fade-down-left">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Our Dedicated Support</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

    
    <section class="ftco-section ftco-destination special-bg">
    	<div class="container">
    		<div class="row justify-content-start mb-5 pb-3">
				<div class="col-md-7 heading-section" data-aos="fade-down">
					<span class="subheading">Featured</span>
					<h2 class="mb-4"><strong>Featured</strong> Tours</h2>
				</div>
        	</div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="destination-slider owl-carousel ftco-animate">
						<?php 
							print_tours(['', '']);
						?>
    				</div>
    			</div>
    		</div>
		</div>
    </section>

    <section class="ftco-section  ">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3" data-aos="fade-down">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading">Special Offers</span>
            <h2 class="mb-4"><strong>Hot</strong> Tours, hurry up</h2>
          </div>
        </div>    		
    	</div>
    	<div class="container-fluid">
    		<div class="row">
			<div class="destination-slider owl-carousel ftco-animate">
				<?php 
					print_only_hot_tours(['', '']);
				?>
				</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-4">Some fun facts</h2>
          </div>
        </div>
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100000">0</strong>
		                <span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="40000">0</strong>
		                <span>Destination Places</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="87000">0</strong>
		                <span>Hotels</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="56400">0</strong>
		                <span>Restaurant</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>


    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-start">
          <div class="col-md-5 heading-section ftco-animate">
          	<span class="subheading">Best Directory Website</span>
            <h2 class="mb-4 pb-3"><strong>Why</strong> Choose Us?</h2>
            <p>We offer you quality trips to different parts of the world that you will remember for a lifetime. Pleasant organizers, fascinating tours, comfortable atmosphere, reliability, favorable prices - all this is a Traveler.</p>
            <p><a href="about.php" class="btn btn-primary btn-outline-primary mt-4 px-4 py-3">Read more</a></p>
          </div>
					<div class="col-md-1"></div>
          <div class="col-md-6 heading-section ftco-animate">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4 pb-3"><strong>What</strong> our guests say about us?</h2>
          	<div class="row ftco-animate">
		          <div class="col-md-12">
		            <div class="carousel-testimony owl-carousel">
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(assets/images/guests-images/person_1.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">For 10 years I have been vacationing with Traveler, the team and tours are simply mesmerizing</p>
		                    <p class="name">John Doe</p>
		                    <span class="position">Guest from italy</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(assets/images/guests-images/person_2.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">I can't imagine my vacation without a Traveler</p>
		                    <p class="name">Dennis Green</p>
		                    <span class="position">Guest from London</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(assets/images/guests-images/person_3.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">I like everything very much, everything is very reliable and at affordable prices</p>
		                    <p class="name">Johann Mayser</p>
		                    <span class="position">Guest from Paris</span>
		                  </div>
		                </div>
		              </div>
					  <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(assets/images/guests-images/person_4.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">I love Traveler for taking care of tourists and pleasant organizers</p>
		                    <p class="name">Ivan Petrov</p>
		                    <span class="position">Guest from Kyiv</span>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
<?php include "footer.php"; ?>
    
  

