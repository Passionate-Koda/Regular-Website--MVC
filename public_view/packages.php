<?php
ob_start();
$page_name = "|Packages";
include("include/header.php");

 ?>

 <section id="pricing-table" class="section">
 <div class="container">
 <div class="row">
 <h2 class="section-title">Find a package that’s fit your needs</h2>
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
 <?php getPackages($conn) ?>
 </div>
 </div>
 </section>




<section class="featured-lis mb30">
<div class="container">
<div class="row">
<div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
<h3 class="section-title">McKodev Projects</h3>
<div id="new-products" class="owl-carousel">
<!-- <div class="item">
<div class="product-item">
<div class="carousel-thumb">
<img src="assets/img/product/img1.jpg" alt="">
<div class="overlay">
<a href="ads-details.html"><i class="fa fa-link"></i></a>
</div>
</div>
<a href="ads-details.html" class="item-name">Lorem ipsum dolor sit</a>
<span class="price">$150</span>
</div>
</div> -->
<!-- <div class="item">
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
</div> -->
<!-- <div class="item">
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
</div> -->
<!-- <div class="item">
<div class="product-item">
<div class="carousel-thumb">
<img src="assets/img/product/img4.jpg" alt="">
<div class="overlay">
<a href="ads-details.html"><i class="fa fa-link"></i></a>
</div>
</div>
<a href="ads-details.html" class="item-name">Feugiat nulla facilisis</a>
<span class="price">$45</span>
</div>
</div> -->
<!-- <div class="item">
<div class="product-item">
<div class="carousel-thumb">
<img src="assets/img/product/img5.jpg" alt="">
<div class="overlay">
<a href="ads-details.html"><i class="fa fa-link"></i></a>
</div>
</div>
<a href="ads-details.html" class="item-name">Feugiat nulla facilisis</a>
<span class="price">$1120</span>
</div>
</div> -->
<?php
getProject($conn);


 ?>


</div>
</div>
</div>
</div>
</div>
</section>


<?php

include ("include/footer.php");

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
</body>

<!-- Mirrored from demo.graygrids.com/themes/classix-template/ads-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2017 11:42:15 GMT -->
</html>
