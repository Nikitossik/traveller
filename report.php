<?php 
include 'action.php';

if (isset($_GET['login']) && $_GET['login'] !== ''){
    $admin = $_GET['login'];
    if (check_log($admin)){
        include 'header.php';
        echo "<nav class='navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light' id='ftco-navbar'>
        <div class='container'>
          <a class='navbar-brand' href='index.php'>Traveller</a>
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#ftco-nav' aria-controls='ftco-nav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='oi oi-menu'></span> Menu
          </button>
    
          <div class='collapse navbar-collapse' id='ftco-nav'>
            <ul class='navbar-nav ml-auto'>
              <li class='nav-item active'><a href='index.php' class='nav-link'>Home</a></li>
              <li class='nav-item'><a href='about.php' class='nav-link'>About</a></li>
              <li class='nav-item'><a href='tours.php' class='nav-link'>Tours</a></li>
              <li class='nav-item'><a href='blog.php' class='nav-link'>Blog</a></li>
              <li class='nav-item'><a href='contact.php' class='nav-link'>Contact Us</a></li>
            </ul>
            <button class='btn btn-primary' data-toggle='modal' data-target='#sign-up-modal'>Sign Up</button>
          </div>
        </div>
      </nav>";

      include "modal.php";

      echo "<div class='hero-wrap banner admin-banner pb-3'>
      <div class='overlay'></div>
      <div class='container pb-3'>
        <div class='row tours-banner__content no-gutters slider-text align-items-center justify-content-center' data-scrollax-parent='true'>
          <div class='col-md-9 ftco-animate text-center'>
            <p class='breadcrumbs'><span class='mr-2'><a href='index.php'>Home</a></span> <span>Admin page</span></p>
            <h1 class='mb-3 bread'>Hello, admin</h1>
          </div>
        </div>
      </div>
    </div>";

    echo "<section class='ftco-section ftco-destination special-bg'>
    	<div class='container'>
    		<div class='row justify-content-start mb-5 pb-3'>
				<div class='col-md-7 heading-section' data-aos='fade-down'>
					<span class='subheading'>All</span>
					<h2 class='mb-4'><strong>All</strong> The Tours</h2>
				</div>
        	</div>
    		<div class='row'>";
					print_tours(['<div class="col-md-4 col-sm-6 col-12">', '</div>']);
    	echo"</div></div></section>";

    echo '<section class="ftco-section ftco-counter img" id="section-counter">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
        <h2 class="mb-4">Admin Info</h2>
      </div>
    </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="'.$admin_info['earned_money'].'">0</strong>
                    <span>Earned money, €</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="'.$admin_info['conducted_tours'].'">0</strong>
                    <span>Conducted Tours</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="'.$admin_info['received_letters'].'">0</strong>
                    <span>Received Letters</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="'.$admin_info['active_tours'].'">0</strong>
                    <span>Active Tours</span>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    </div>
</section>';

    include 'footer.php';
    }
}
else{
    header('Location: index.php');
}
?>