<?php 
    include "header.php";
	include "action.php";
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
          <li class="nav-item"><a href="tours.php" class="nav-link">Tours</a></li>
          <li class="nav-item active"><a href="contact.php" class="nav-link">Contact Us</a></li>
        </ul>
        <button class="btn btn-primary" data-toggle="modal" data-target="#sign-up-modal">Sign Up</button>
      </div>
    </div>
  </nav>

  <?php include "modal.php"; ?>
  
<div class="hero-wrap banner contact-banner pb-3">
      <div class="overlay"></div>
      <div class="container pb-3">
        <div class="row tours-banner__content no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs" data-scrollax="properties: { translateX: '-30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span>Tours</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateX: '30%', opacity: 1.6 }">Contact Us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span> Unter den Linden 63-65, 10117 Berlin, Germany</p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel:/+ (49 30) 229-11-10">+ (49 30) 229-11-10</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:traveller@gmail.com">traveller@gmail.com</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Website</span> <a href="index.php">traveller.com</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
            <form action="#">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 embed-responsive embed-responsive-16by9" id="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d310843.4641580511!2d13.144556336487858!3d52.50693125168089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a84e373f035901%3A0x42120465b5e3b70!2z0JHQtdGA0LvQuNC9LCDQk9C10YDQvNCw0L3QuNGP!5e0!3m2!1sru!2sua!4v1619336052257!5m2!1sru!2sua" class="embed-responsive-item" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </section>



<?php
    include "footer.php";
?>