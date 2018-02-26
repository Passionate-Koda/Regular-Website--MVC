<?php
ob_start();
$page_name = "|Request Quote";
include("include/header.php");
$info = getPackageNameByHash($conn, $_GET['package']);
extract($info);
$error = [];

if(array_key_exists('submit', $_POST)){
  if(empty($_POST['phonenumber'])){
    $error['phonenumber']="Enter a Phone Number";
  }
  if(empty($_POST['email'])){
    $error['email']="Enter Email";
  }
  if(empty($_POST['name'])){
    $error['name']="Enter Name";
  }

  if(empty($error)){
    $message = 'Quote Request From '.$_POST['name'].'for '.$_POST['package'].'';
    $email = $_POST['email'];
    $phone = $_POST['phonenumber'];


    include('Mail.php'); // includes the PEAR Mail class, already on your server.

    $username = 'info@mckodev.com.ng'; // your email address
    $password = '6Z4m7Nar3u'; // your email address password

    $from = "info@mckodev.com.ng";
    $to = "banjimayowa@gmail.com";
    $subject = "Quote Request"." from ".$_POST['name'];
    $body= "$message :Message by: $email :Phone Number: $phone";

        $msg = [];
    $headers = array ('From' => $from, 'To' => $to, 'Subject' => $subject); // the email headers
    $smtp = Mail::factory('smtp', array ('host' =>'localhost', 'auth' => true, 'username' => $username, 'password' => $password, 'port' => '25')); // SMTP protocol with the username and password of an existing email account in your hosting account
    $mail = $smtp->send($to, $headers, $body); // sending the email

    if (PEAR::isError($mail)){
    $msg['failed'] = $mail->getMessage() ;
    }
    else {
    $msg['done'] = "Quote Requested";
    // header("Location: http://www.example.com/"); // you can redirect page on successful submission.
    }

  }

}


 ?>


<div class="page-header" style="background: url(assets/img/banner1.jpg);">
<div class="container">
<div class="row">
  <?php if(isset($msg['done'])){
    echo '<div class="col-md-12">
  <div class="inner-box posting">
  <div class="alert alert-success alert-lg" role="alert">
  <h2 class="postin-title">✔ Successful! '.$msg['done'].' </h2>
  <p>Thank you, McKodev will get back to you. </p>
  </div>
  </div>
  </div>';
  } ?>
  <?php if(isset($msg['failed'])){
    echo '<div class="col-md-12">
  <div class="inner-box posting">
  <div class="alert alert-danger alert-lg" role="alert">
  <h2 class="postin-title">ops! '.$msg['failed'].' </h2>
  <p>Please Try Again, Thanks for your patience </p>
  </div>
  </div>
  </div>';
  } ?>
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="page-title">Request Quote</h2>
</div>
</div>
</div>
</div>
</div>


<section id="content">
<div class="container">
<div class="row">
<div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
<div class="page-login-form box">
<h3>
Request Quote For "<?php echo $package_name ?>" Package
</h3>
<form role="form" action="" method="post" class="login-form">
<div class="form-group">
  <?php $display = displayErrors($error, 'name');
  echo $display ?>
<div class="input-icon">

<i class="icon fa fa-user"></i>
<input type="text" id="sender-email" class="form-control" name="name" placeholder="FULLNAME">
</div>
</div>
<div class="form-group">
  <?php $display = displayErrors($error, 'phonenumber');
  echo $display ?>
<div class="input-icon">

<i class="icon fa fa-phone"></i>
<input type="text" id="sender-email" class="form-control" name="phonenumber" placeholder="PHONE NUMBER">
</div>
</div>
<div class="form-group">
  <?php $display = displayErrors($error, 'email');
  echo $display ?>
<div class="input-icon">

<i class="icon fa fa-inbox"></i>
<input type="email" class="form-control" name="email" placeholder="EMAIL">
</div>
</div>
<input class="btn btn-common log-btn" type="submit" name="submit" value="Submit">
</form>
</div>
</div>
</div>
</div>
</section>




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

<!-- Mirrored from demo.graygrids.com/themes/classix-template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2017 11:40:55 GMT -->
</html>
