

<?php
include("include/link_include.php");
include("include/authentication.php");
authenticate();
if(isset($_SESSION['id'])){
  $session = $_SESSION['id'];
}
$info = adminInfo($conn,$session);
extract($info);



$error = [];
if(array_key_exists('submit', $_POST)){
  $ext = ["image/jpg", "image/JPG", "image/jpeg", "image/JPEG", "image/png", "image/PNG"];
  if(empty($_FILES['upload']['name'])){
    $error['upload'] = "Please choose file";
  }
  if(empty($_FILES['upload1']['name'])){
    $error['upload1'] = "Please choose file";
  }
  if(empty($_FILES['upload2']['name'])){
    $error['upload2'] = "Please choose file";
  }
  if(empty($_POST['header_title'])){
    $error['header_title'] = "Enter Header Title";
  }
  if(empty($_POST['txt'])){
    $error['txt'] = "Enter Text";
}
  if(empty($error)){
    $ver = compressImage($_FILES,'upload',50, 'uploads/' );
    $clean =  array_map('trim',$_POST );
    addFrontage($conn, $clean, $ver,$hash_id);
  }
}



 ?>
<section id="content">
<div class="container">
<div class="row">

<?php if (isset($_GET['success'])){
$msg = str_replace('_', ' ', $_GET['success']);

  echo '<div class="col-md-12">
<div class="inner-box posting">
<div class="alert alert-success alert-lg" role="alert">
<h2 class="postin-title">✔ Successful! '.$msg.' </h2>
<p>Thank you '.ucwords($firstname).', McKodev is happy to have you around. </p>
</div>
</div>
</div>';
} ?>
<div class="col-sm-12 col-md-10 col-md-offset-1">
<div class="page-ads box">
<h2 class="title-2">Welcome to the profile page</h2>
<div class="row search-bar mb30 red">
<div class="advanced-search">
<form class="search-form" method="get">
<h3>PLEASE FILL IN YOUR PROFILE</h3>
</form>
</div>
</div>
<form class="form-ad">

<div class="form-group mb30">
<label class="control-label">FULLNAME</label> <input class="form-control input-md" name="Adtitle"  type="text" placeholder="Enter your fullname"/>
</div>
<div class="form-group mb30">
<label class="control-label" for="textarea">PORTFOLIO</label>
<textarea class="form-control" id="textarea" name="textarea" placeholder="Enter Your Portfolio" rows="4"></textarea>
</div>
<div class="form-group mb30">
<label class="control-label" for="textarea">BIO</label>
<textarea class="form-control" id="textarea" name="textarea" placeholder="Enter your bio" rows="4"></textarea>
</div>
<div class="form-group mb30">
<label class="control-label">PHONE NUMBER</label> <input class="form-control input-md" name="Adtitle"  type="text"placeholder="Enter phonenumber"/>
</div>
<div class="form-group mb30">
<label class="control-label">FACEBOOK LINK</label> <input class="form-control input-md" name="Adtitle"  type="text"placeholder="Enter your facebook link"/>
</div>
<div class="form-group mb30">
<label class="control-label">TWITTER LINK</label> <input class="form-control input-md" name="Adtitle"  type="text" placeholder="Enter your twitter link"/>
</div>
<div class="form-group mb30">
<label class="control-label">LOCATION</label> <input class="form-control input-md" name="Adtitle"  type="text" placeholder="Enter your location"/>
</div>
<div class="form-group mb30">
<label class="control-label">INSTAGRAM LINK</label> <input class="form-control input-md" name="Adtitle"  type="text" placeholder="enter Your instagram link"/>
</div>
<div class="form-group mb30">
<label class="control-label">LINKDIN LINK</label> <input class="form-control input-md" name="Adtitle"  type="text" placeholder="Enter your linkdin link">
</div>

<h2 class="title-2">UPLOAD IMAGE</h2>
<div class="form-group">
<label class="control-label">Featured Image</label> <input class="file" id="featured-img" type="file"><br>
<input class="file" data-show-preview="featured-img" id="gallery-img-a" type="file"><br>

<input class="file" data-show-preview="featured-img" id="gallery-img-b" type="file"><br>

</div>
<p class="help-block">Add 3 photos of yourself</p>
<button class="btn btn-common" name="submit" type="button">Submit for review</button>
</form>
</div>


</div>
</div>
</div>
</div>
</div>

</section>
<a class="back-to-top" href="#"><i class="fa fa-angle-up"></i></a>
<script src="assets/js/jquery-min.js" type="text/javascript">
  </script>
<script src="assets/js/bootstrap.min.js" type="text/javascript">
  </script>
<script src="assets/js/material.min.js" type="text/javascript">
  </script>
<script src="assets/js/material-kit.js" type="text/javascript">
  </script>
<script src="assets/js/jquery.parallax.js" type="text/javascript">
  </script>
<script src="assets/js/owl.carousel.min.js" type="text/javascript">
  </script>
<script src="assets/js/wow.js" type="text/javascript">
  </script>
<script src="assets/js/main.js" type="text/javascript">
  </script>
<script src="assets/js/jquery.counterup.min.js" type="text/javascript">
  </script>
<script src="assets/js/waypoints.min.js" type="text/javascript">
  </script>
<script src="assets/js/jasny-bootstrap.min.js" type="text/javascript">
  </script>
<script src="assets/js/form-validator.min.js" type="text/javascript">
  </script>
<script src="assets/js/contact-form-script.js" type="text/javascript">
  </script>
<script src="assets/js/jquery.themepunch.revolution.min.js" type="text/javascript">
  </script>
<script src="assets/js/jquery.themepunch.tools.min.js" type="text/javascript">
  </script>
<script src="assets/js/bootstrap-select.min.js">
  </script>
<script src="assets/js/fileinput.js">
  </script>
</body>

<!-- Mirrored from demo.graygrids.com/themes/classix-template/post-ads.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2017 11:40:57 GMT -->
</html>
