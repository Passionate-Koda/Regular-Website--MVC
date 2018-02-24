<?php
if(array_key_exists('submit', $_POST)){
		$email = $_POST['email'];
		$message = "You have subscribed to McKodev Newsletter. We will always notify you of latest information from Mckodev. We will send you necessary informations alone.";


		include('Mail.php'); // includes the PEAR Mail class, already on your server.

		$username = 'info@mckodev.com.ng'; // your email address
		$password = '6Z4m7Nar3u'; // your email address password

		$from = "info@mckodev.com.ng";
		$to = "banjimayowa@gmail.com,$email";
		$subject = "Subscription to McKodev Newsletter";
		$body= "$message . McKodev";




		$headers = array ('From' => $from, 'To' => $to, 'Subject' => $subject); // the email headers
		$smtp = Mail::factory('smtp', array ('host' =>'localhost', 'auth' => true, 'username' => $username, 'password' => $password, 'port' => '25')); // SMTP protocol with the username and password of an existing email account in your hosting account
		$mail = $smtp->send($to, $headers, $body); // sending the email

		if (PEAR::isError($mail)){
		echo("<p>" . $mail->getMessage() . "</p>");
		}
		else {
		echo("<p>Message successfully sent!</p>");
		// header("Location: http://www.example.com/"); // you can redirect page on successful submission.
		}

}

include 'include/header.php'

 ?>
<section id="slider">
<div class="tp-banner-container">
<div class="tp-banner">
<ul>

  <?php getFrontage($conn) ?>
<!-- <li class="tp-revslider-slidesli active-revslide current-sr-slide-visible" data-slotamount="7" data-masterspeed="2000" data-thumb="assets/img/slider/slide1.jpg" data-delay="10000" data-saveperformance="on">

<img src="assets/img/dummy.png" alt="laptopmockup_sliderdy" data-lazyload="assets/img/slider/slide1.jpg" data-bgposition="right top" data-duration="12000" data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100" data-bgpositionend="center bottom">

<div class="tp-caption largeHeadingWhite customin customout tp-resizeme rs-parallaxlevel-0 start" data-x="35" data-y="center" data-voffset="-80" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-speed="1200" data-start="1550" data-easing="Back.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400" data-endeasing="Back.easeIn" style="z-index: 11;">
<h1 style="min-height: 0px; min-width: 0px; line-height: 94px; border-width: 0px; margin: 0px 0px 20px; padding: 0px; letter-spacing: 2px; font-size: 50px; text-transform: uppercase; font-weight: 700; color: #fff;">Welcome to ClassiX</h1>
</div>

<div class="tp-caption detailText p lft tp-resizeme rs-parallaxlevel-0 start" data-x="35" data-y="center" data-voffset="0" data-speed="1200" data-start="2100" data-easing="easeInOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 11;">
<p style="min-height: 0px; min-width: 0px; line-height: 20px; border-width: 0px; margin: 0px 0px 20px; padding: 0px; letter-spacing: 0px; font-size: 14px; color: #fff;">Used Cars To Mobile Phones And Computers, Or Search</br> For Property, Jobs And More.</p>
</div>


</li> -->

<!-- <li class="tp-revslider-slidesli active-revslide current-sr-slide-visible" data-slotamount="7" data-masterspeed="2000" data-thumb="assets/img/slider/slide2.jpg" data-delay="10000" data-saveperformance="on">

<img src="assets/img/dummy.png" alt="laptopmockup_sliderdy" data-lazyload="assets/img/slider/slide2.jpg" data-bgposition="right top" data-duration="12000" data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100" data-bgpositionend="center bottom">

<div class="tp-caption largeHeadingWhite customin customout tp-resizeme rs-parallaxlevel-0 start" data-x="35" data-y="center" data-voffset="-80" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-speed="1200" data-start="1550" data-easing="Back.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400" data-endeasing="Back.easeIn" style="z-index: 11;">
<h1 style="min-height: 0px; min-width: 0px; line-height: 94px; border-width: 0px; margin: 0px 0px 20px; padding: 0px; letter-spacing: 2px; font-size: 50px; text-transform: uppercase; font-weight: 700; color: #fff;">Buy and Sell Anything</h1>
</div>

<div class="tp-caption detailText p lft tp-resizeme rs-parallaxlevel-0 start" data-x="35" data-y="center" data-voffset="0" data-speed="1200" data-start="2100" data-easing="easeInOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 11;">
<p style="min-height: 0px; min-width: 0px; line-height: 20px; border-width: 0px; margin: 0px 0px 20px; padding: 0px; letter-spacing: 0px; font-size: 14px; color: #fff;">Used Cars To Mobile Phones And Computers, Or Search</br> For Property, Jobs And More.</p>
</div>


<div class="tp-caption lfr customout start" data-x="right" data-hoffset="0" data-y="80" data-voffset="160" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-speed="1000" data-start="950" data-easing="easeOutQuart" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400" data-endeasing="Back.easeInOut" style="z-index: 6;">
<div><img src="assets/img/slider/girl1.png" alt=""></div>
</div>
</li> -->




<!-- <li class="tp-revslider-slidesli active-revslide current-sr-slide-visible" data-slotamount="7" data-masterspeed="2000" data-thumb="assets/img/slider/slide3.jpg" data-delay="10000" data-saveperformance="on">

<img src="assets/img/dummy.png" alt="laptopmockup_sliderdy" data-lazyload="assets/img/slider/slide3.jpg" data-bgposition="right top" data-duration="12000" data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100" data-bgpositionend="center bottom">

<div class="tp-caption largeHeadingWhite customin customout tp-resizeme rs-parallaxlevel-0 start" data-x="center" data-y="center" data-voffset="-80" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-speed="1200" data-start="1550" data-easing="Back.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400" data-endeasing="Back.easeIn" style="z-index: 11;">
<h1 style="text-align: center; min-height: 0px; min-width: 0px; line-height: 94px; border-width: 0px; margin: 0px 0px 20px; padding: 0px; letter-spacing: 2px; font-size: 50px; text-transform: uppercase; font-weight: 700; color: #fff;">Start Exploring Great Deals</h1>
</div>

<div class="tp-caption detailText p lft tp-resizeme rs-parallaxlevel-0 start" data-x="center" data-y="center" data-voffset="0" data-speed="1200" data-start="2100" data-easing="easeInOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 11;">
<p style="min-height: 0px; min-width: 0px; line-height: 30px; border-width: 0px; margin: 0px 0px 20px; padding: 0px; letter-spacing: 0px; font-size: 14px; color: #fff; text-align: center;">Used Cars To Mobile Phones And Computers, Or Search For Property, Jobs And Moren. </br> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
</div>


</li>
<li class="tp-revslider-slidesli active-revslide current-sr-slide-visible" data-slotamount="7" data-masterspeed="2000" data-thumb="assets/img/slider/slide3.jpg" data-delay="10000" data-saveperformance="on">

<img src="assets/img/dummy.png" alt="laptopmockup_sliderdy" data-lazyload="assets/img/slider/slide3.jpg" data-bgposition="right top" data-duration="12000" data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100" data-bgpositionend="center bottom">

<div class="tp-caption largeHeadingWhite customin customout tp-resizeme rs-parallaxlevel-0 start" data-x="center" data-y="center" data-voffset="-80" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-speed="1200" data-start="1550" data-easing="Back.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400" data-endeasing="Back.easeIn" style="z-index: 11;">
<h1 style="text-align: center; min-height: 0px; min-width: 0px; line-height: 94px; border-width: 0px; margin: 0px 0px 20px; padding: 0px; letter-spacing: 2px; font-size: 50px; text-transform: uppercase; font-weight: 700; color: #fff;">Start Exploring Great Deals</h1>
</div>

<div class="tp-caption detailText p lft tp-resizeme rs-parallaxlevel-0 start" data-x="center" data-y="center" data-voffset="0" data-speed="1200" data-start="2100" data-easing="easeInOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 11;">
<p style="min-height: 0px; min-width: 0px; line-height: 30px; border-width: 0px; margin: 0px 0px 20px; padding: 0px; letter-spacing: 0px; font-size: 14px; color: #fff; text-align: center;">Used Cars To Mobile Phones And Computers, Or Search For Property, Jobs And Moren. </br> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
</div>


</li> -->
</ul>
</div>
</div>
</section>





<div class="features">
<div class="container">
<div class="row">
<div class="col-md-4 col-sm-6">
<div class="features-box wow fadeInDownQuick" data-wow-delay="0.3s">
<div class="features-icon">
<i class="fa fa-book">
</i>
</div>
<div class="features-content">
<h4>
Full Documented
</h4>
<p>
We document how you customize your website from your in-built content management system.
</p>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="features-box wow fadeInDownQuick" data-wow-delay="0.6s">
<div class="features-icon">
<i class="fa fa-paper-plane"></i>
</div>
<div class="features-content">
<h4>
Clean & Modern Design
</h4>
<p>
We give you a clean and mordern design that appeals to your customers, users, clients and other visitors to your website pages.
</p>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="features-box wow fadeInDownQuick" data-wow-delay="0.9s">
<div class="features-icon">
<i class="fa fa-map"></i>
</div>
<div class="features-content">
<h4>
Great Features
</h4>
<p>
Your Website is packed with various features that are modeled according to the purpose of the website.
</p>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="features-box wow fadeInDownQuick" data-wow-delay="1.2s">
<div class="features-icon">
<i class="fa fa-cogs"></i>
</div>
<div class="features-content">
<h4>
Completely Customizable
</h4>
<p>
Every Content of you website is Customizable from your Computer Sytem, Tablet or Smartphone anytime, anyday.
</p>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="features-box wow fadeInDownQuick" data-wow-delay="1.5s">
<div class="features-icon">
<i class="fa fa-hourglass"></i>
</div>
<div class="features-content">
<h4>
100% Responsive Layout
</h4>
<p>
We create responsive websites that is responsive to all gadgets(Computer, Tablet, Phones) of various screen sizes.
</p>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="features-box wow fadeInDownQuick" data-wow-delay="1.8s">
<div class="features-icon">
<i class="fa fa-hashtag"></i>
</div>
<div class="features-content">
<h4>
User Friendly
 </h4>
<p>
Our website are designed to ensure convinient engagements for users, packed with reasonable and professional animations and transitions and other user friendly features
</p>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="features-box wow fadeInDownQuick" data-wow-delay="2.1s">
<div class="features-icon">
<i class="fa fa-newspaper-o"></i>
</div>
<div class="features-content">
<h4>
Awesome Layout
</h4>
<p>
We give well positioned layout that are pleasing and makes surfing convinient
</p>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="features-box wow fadeInDownQuick" data-wow-delay="2.4s">
<div class="features-icon">
<i class="fa fa-leaf"></i>
</div>
<div class="features-content">
<h4>
High Quality
</h4>
<p>
At McKodev, delivering quality website is our ONLY priority, and with us, It is Quality or Nothing.
</p>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="features-box wow fadeInDownQuick" data-wow-delay="2.7s">
<div class="features-icon">
<i class="fa fa-space-shuttle"></i>
</div>
<div class="features-content">
<h4>
Speed
</h4>
<p>
We optimize your website for speed and fast access to your pages without having to wait for longer time.
</p>
</div>
</div>
</div>
</div>
</div>
</div>


<section class="featured-lis">
<div class="container">
<div class="row">
<div class="col-md-12 wow fadeIn" data-wow-delay="0.8s">
<h3 class="section-title">Mckodev Projects</h3>
<div id="new-products" class="owl-carousel">
    <?php
getProject($conn);


     ?>
<!-- <div class="item">
<div class="product-item">
<div class="carousel-thumb">
<img src="assets/img/product/img1.jpg" alt="">
<div class="overlay">
<a href="ads-details.html"><i class="fa fa-link"></i></a>
</div>
</div>
<a href="facebook." class="item-name">Lorem ipsum dolor sit</a>
<span class="price">$150</span>
</div>
</div>
<div class="item">
<div class="product-item">
<div class="carousel-thumb">
<img src="assets/img/product/img2.jpg" alt="">
<div class="overlay">
<a href="ads-details.html"><i class="fa fa-link"></i></a>
</div>
</div>
<a href="ads-details.html" class="item-name">Sed diam nonummy</a>
<span class="price">$67</span>
</div>
</div>
<div class="item">
<div class="product-item">
<div class="carousel-thumb">
<img src="assets/img/product/img3.jpg" alt="">
<div class="overlay">
<a href="ads-details.html"><i class="fa fa-link"></i></a>
</div>
</div>
<a href="ads-details.html" class="item-name">Feugiat nulla facilisis</a>
<span class="price">$300</span>
</div>
</div>
<div class="item">
<div class="product-item">
<div class="carousel-thumb">
<img src="assets/img/product/img4.jpg" alt="">
<div class="overlay">
<a href="ads-details.html"><i class="fa fa-link"></i></a>
</div>
</div>
<a href="ads-details.html" class="item-name">Lorem ipsum dolor sit</a>
<span class="price">$149</span>
</div>
</div>
<div class="item">
<div class="product-item">
<div class="carousel-thumb">
<img src="assets/img/product/img5.jpg" alt="">
<div class="overlay">
<a href="ads-details.html"><i class="fa fa-link"></i></a>
</div>
</div>
<a href="ads-details.html" class="item-name">Sed diam nonummy</a>
<span class="price">$90</span>
</div>
</div>
<div class="item">
<div class="product-item">
<div class="carousel-thumb">
<img src="assets/img/product/img6.jpg" alt="">
<div class="overlay">
<a href="ads-details.html"><i class="fa fa-link"></i></a>
</div>
</div>
<a href="ads-details.html" class="item-name">Praesent luptatum zzril</a>
<span class="price">$169</span>
</div>
</div>
<div class="item">
<div class="product-item">
<div class="carousel-thumb">
<img src="assets/img/product/img7.jpg" alt="">
<div class="overlay">
<a href="ads-details.html"><i class="fa fa-link"></i></a>
</div>
</div>
<a href="ads-details.html" class="item-name">Lorem ipsum dolor sit</a>
<span class="price">$79</span>
</div>
</div> -->
<!-- <div class="item">
<div class="product-item">
<div class="carousel-thumb">
<img src="assets/img/product/img8.jpg" alt="">
<div class="overlay">
<a href="ads-details.html"><i class="fa fa-link"></i></a>
</div>
</div>
<a href="ads-details.html" class="item-name">Sed diam nonummy</a>
<span class="price">$149</span>
</div>
</div> -->
</div>
</div>
</div>
</div>
</section>



<section id="pricing-table" class="section">
<div class="container">
<div class="row">
<h2 class="section-title">Find a package that’s fit your needs</h2>
<?php getPackages($conn) ?>
<!-- <div class="col-sm-4 wow fadeInDownQuick" data-wow-delay="0s">
<div class="table wow">
<div class="title">
<h3>Free</h3>
</div>
<div class="pricing-header">
<p class="price-value"> <sup>$</sup>0</p>
<p class="price-quality">per month</p>
</div>
<ul class="description">
<li><i class="fa fa-check-square"></i>Free ad posting</li>
<li><i class="fa fa-times-circle-o"></i>Featured ads availability</li>
<li><i class="fa fa-times-circle-o"></i>Multi-user</li>
<li><i class="fa fa-check-square"></i>100% Secure!</li>
</ul>
<a href="packages.php">
<button class="btn btn-common" type="submit">Create Account</button>
</a>
</div>
</div>
<div class="col-sm-4 wow fadeInDownQuick" data-wow-delay="0.5s">
<div class="table" id="active-tb">
<div class="title">
<h3>Standard</h3>
</div>
<div class="pricing-header">
<p class="price-value"> <sup>$</sup>12</p>
<p class="price-quality">per month</p>
</div>
<ul class="description">
<li><i class="fa fa-check-square"></i>Free ad posting</li>
<li><i class="fa fa-check-square"></i>6&nbsp;Featured ads availability</li>
<li><i class="fa fa-check-square"></i>3 Users</li>
<li><i class="fa fa-check-square"></i>100% Secure!</li>
</ul>
<a href="packages.php">
<button class="btn btn-common" type="submit">Purchase Now</button>
</a>
</div>
</div>
<div class="col-sm-4 wow fadeInDownQuick" data-wow-delay="0.8s">
<div class="table">
<div class="title">
<h3>Platinum</h3>
</div>
<div class="pricing-header">
<p class="price-value"> <sup>$</sup>29</p>
<p class="price-quality">per month</p>
</div>
<ul class="description">
<li><i class="fa fa-check-square"></i>Free ad posting</li>
<li><i class="fa fa-check-square"></i>20&nbsp;Featured ads availability</li>
<li><i class="fa fa-check-square"></i>Unlimited users</li>
<li><i class="fa fa-check-square"></i>100% Secure!</li>
</ul>
<a href="packages.php">
 <button class="btn btn-common" type="submit">Purchase Now</button>
</a>
</div>
</div> -->
</div>
</div>
</section>


<section class="location">
<div class="container">
<div class="row localtion-list">
<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.5s">
<h3 class="title-2"><i class="fa fa-envelope"></i> Subscribe for updates</h3>
<form action="" method="post">
<p>Join our subscribers and get info about the latest freebies, announcements and resources!</p>
<div class="subscribe">
<input class="form-control" name="email" placeholder="Your email here" required type="email">
<input class="btn btn-common" type="submit" name="submit" value="Subscribe">

</div>
</form>
</div>
<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-delay="1s">
<aside style="width:100%;" id="sidebar" class="col-md-4 right-sidebar">

  <div class="widget widget-popular-posts">
  <div class="widget-title">
  <h4>Recent Posts</h4>
  </div>
  <ul class="posts-list">
  <!-- <li>
  <div class="widget-thumb">
  <a href="#"><img src="assets/img/post/thumb1.jpg" alt="" /></a>
  </div>
  <div class="widget-content">
  <a href="#">Goodness Lemur Save Much Alas crud dear</a>
  <span><i class="icon-calendar"></i>09 October, 2017</span>
  </div>
  <div class="clearfix"></div>
  </li> -->
  <!-- <li>
  <div class="widget-thumb">
  <a href="#"><img src="assets/img/post/thumb2.jpg" alt="" /></a>
  </div>
  <div class="widget-content">
  <a href="#">However Much Enor Mous Merrily Jeez</a>
  <span><i class="icon-calendar"></i>25 October, 2017</span>
  </div>
  <div class="clearfix"></div> -->
<!-- </li> -->
<?php getRecentPost($conn, 2); ?>
 </ul>
 </div>
</aside>
</div>
</div>
</div>
</section>

</div>


<?php
  include 'include/footer.php';
 ?>
 <script type="text/javascript" src="assets/js/jquery-min.js"></script>
 <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="assets/js/material.min.js"></script>
 <script type="text/javascript" src="assets/js/material-kit.js"></script>
 <script type="text/javascript" src="assets/js/jquery.parallax.js"></script>
 <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
 <script type="text/javascript" src="assets/js/wow.js"></script>
 <script type="text/javascript" src="assets/js/main.js"></script>
 <script type="text/javascript" src="assets/js/jquery.counterup.min.js"></script>
 <script type="text/javascript" src="assets/js/waypoints.min.js"></script>
 <script type="text/javascript" src="assets/js/jasny-bootstrap.min.js"></script>
 <script type="text/javascript" src="assets/js/form-validator.min.js"></script>
 <script type="text/javascript" src="assets/js/contact-form-script.js"></script>
 <script type="text/javascript" src="assets/js/jquery.themepunch.revolution.min.js"></script>
 <script type="text/javascript" src="assets/js/jquery.themepunch.tools.min.js"></script>
 <script src="assets/js/bootstrap-select.min.js"></script>
 <script type="text/javascript">

 function getList(red){
   var url = 'list';
   var method = 'POST';
   var params = 'pn='+red;
   // var params = 'state=' + document.getElementById('stateid').value;
   showList(url,method,params,red);
   console.log(url);
 }

 function showList(url, method,params,id){
   var xhr = new XMLHttpRequest();
   xhr.onreadystatechange = function(){
     if(xhr.readyState == 4){
        var res = xhr.responseText;
        console.log(res);
     document.getElementById(id).innerHTML = xhr.responseText;
     }
   }
   xhr.open(method, url, true);
   xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
   var sd = xhr.send(params);
 }

 </script>
</body>

<!-- Mirrored from demo.graygrids.com/themes/classix-template/index-v-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2017 11:41:20 GMT -->
</html>
