<?php

include 'include/header.php';

 ?>


<div class="page-header" style="background: url(assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<h1 class="page-title">Mckodev Blog</h1>
</div>
</div>
</div>
</div>


<div id="content">
<div class="container">
<div class="row">
<div class="col-md-8">
  <?php getPost($conn) ?>

<!-- <div class="blog-post">

<div class="post-thumb">
<a href="#"><img src="assets/img/blog/blog1.jpg" alt=""></a>
<div class="hover-wrap">
</div>
</div>


<div class="post-content">
<h4 class="post-title"><a href="blog-details.html">On up to the east side to a deluxe apartment in the sky</a></h4>
<div class="meta">
<span class="meta-part"><a href="#"><i class="fa fa-user"></i> Will Smith</a></span>
<span class="meta-part"><a href="#"><i class="fa fa-clock-o"></i> 13 June 2015</a></span>
<span class="meta-part"><a href="#"><i class="fa fa-comment"></i> Comments 0</a></span>
</div>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua. Class aptent taciti sociosqu ad litora torquent…</p>
<a href="blog-detail.html" class="btn btn-common btn-rm">Read More</a>
</div>

</div> -->


<!-- <div class="blog-post">

<div class="post-thumb">
<a href="#"><img src="assets/img/blog/blog2.jpg" alt=""></a>
<div class="hover-wrap">
</div>
</div>


<div class="post-content">
<h4 class="post-title"><a href="blog-details.html">A shadowy flight into the dangerous world of a man</a></h4>
<div class="meta">
<span class="meta-part"><a href="#"><i class="fa fa-user"></i> Will Smith</a></span>
<span class="meta-part"><a href="#"><i class="fa fa-clock-o"></i> 13 June 2015</a></span>
<span class="meta-part"><a href="#"><i class="fa fa-comment"></i> Comments 0</a></span>
</div>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua. Class aptent taciti sociosqu ad litora torquent…</p>
<a href="blog-detail.html" class="btn btn-common btn-rm">Read More</a>
</div>

</div> -->


<!-- <div class="blog-post quote-post">
<div class="quote-wrap">
<i class="fa fa-quote-left"></i>
<blockquote class="text-center">
Crafting visually stunning memorable experiences
<br>
for web and interfaces.
</blockquote>
<i class="fa fa-quote-right"></i>
</div>
</div> -->


<!-- <div class="blog-post">

<div class="post-thumb">
<a href="#"><img src="assets/img/blog/blog3.jpg" alt=""></a>
<div class="hover-wrap">
</div>
</div>


<div class="post-content">
<h4 class="post-title"><a href="blog-details.html">Fateful trip that started form this tropic port aboard</a></h4>
<div class="meta">
<span class="meta-part"><a href="#"><i class="fa fa-user"></i> Will Smith</a></span>
<span class="meta-part"><a href="#"><i class="fa fa-clock-o"></i> 13 June 2015</a></span>
<span class="meta-part"><a href="#"><i class="fa fa-comment"></i> Comments 0</a></span>
</div>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua. Class aptent taciti sociosqu ad litora torquent…</p>
<a href="blog-detail.html" class="btn btn-common btn-rm">Read More</a>
</div>

</div> -->



<div class="pagination-bar">
<ul class="pagination">
<li class="active"><a href="#">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#"> ...</a></li>
<li><a class="pagination-btn" href="#">Next »</a></li>
</ul>
</div>

</div>

<aside id="sidebar" class="col-md-4 right-sidebar">

  <div class="inner-box">
  <div class="widget-title">
  <h4>Advertisement</h4>
  </div>
  <img src="assets/img/img1.jpg" alt="">
  </div>

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
</li>
<li>
 <div class="widget-thumb">
<a href="#"><img src="assets/img/post/thumb2.jpg" alt="" /></a>
</div>
<div class="widget-content">
<a href="#">However Much Enor Mous Merrily Jeez</a>
<span><i class="icon-calendar"></i>25 October, 2017</span>
</div>
<div class="clearfix"></div>
</li>
<li>
<div class="widget-thumb">
<a href="#"><img src="assets/img/post/thumb3.jpg" alt="" /></a>
</div>
<div class="widget-content">
<a href="#">Flinched More Mam Moth This Pompously</a>
<span><i class="icon-calendar"></i>10 October, 2017</span>
</div>
<div class="clearfix"></div>
</li> -->
<?php getRecentPost($conn, 3); ?>
</ul>
</div>

</aside>

</div>
</div>
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
</body>

<!-- Mirrored from demo.graygrids.com/themes/classix-template/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2017 11:42:34 GMT -->
</html>
