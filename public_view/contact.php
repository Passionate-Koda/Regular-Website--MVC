<?php

if(array_key_exists('submit', $_POST)){
		$message = $_POST['message'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
    $sub = $_POST['subject'];

		include('Mail.php'); // includes the PEAR Mail class, already on your server.

		$username = 'info@mckodev.com.ng'; // your email address
		$password = '6Z4m7Nar3u'; // your email address password

		$from = "info@mckodev.com.ng";
		$to = "banjimayowa@gmail.com";
		$subject = $sub." from ".$_POST['name'];
		$body= "$message :Message by: $email :Phone Number: $phone";




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


include 'include/header.php';



 ?>
 <style>
         body,
         html {
           padding: 0;
           height: 460px;
         }
       </style>

<div class="page-header" style="background: url(assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="page-title">Contact Us</h2>
</div>
</div>
</div>
</div>
</div>


<section id="content">
<div class="container">
<div class="row">
<div class="col-md-8">
<h2 class="title-2">
We love to hear from you
</h2>

<form  class="contact-form"  action="" method="post">
<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-md-12">
<div class="form-group">
<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>

</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="email" name="email" class="form-control" id="email" placeholder="Your email" required>

</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="number" class="form-control" id="email" placeholder="Your Phone Number" name="phone" required>

</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required >

</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="row">
<div class="col-md-12">
<div class="form-group">
<textarea class="form-control" name="message" placeholder="Massage" rows="10" data-error="Write your message" required></textarea>

</div>
</div>
</div>
</div>
<div class="col-md-12">
  <input type="submit" class="btn btn-common" name="submit" value="Send Your Message">
<div class="clearfix"></div>
</div>
</div>
</form>
</div>
<div class="col-md-4">
<h2 class="title-2">
Contact Information
</h2>
<div class="information">

<div class="contact-datails">
<div class="icon">
<i class="fa fa-phone icon-radius"></i>
</div>
<div class="info">
<h3>Phone Numbers</h3>
<span class="detail">Phone 1: +2348168785591</span>
<span class="datail">Phone 2: +2348133475878 </span>
</div>
</div>
<div class="contact-datails">
<div class="icon">
<i class="fa fa-location-arrow icon-radius"></i>
</div>
<div class="info">
<h3>Email Address</h3><span class="detail">Customer
Support: <a href="mailto:info@mckodev.com.ng">info@mckodev.com</a></span><br>


<span class="detail">Technical Support: <a href="mailto:technical@mckodev.com.ng">technical@mckodev.com.ng</a></span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<div id="google-map"></div>

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
    var map;
    var plain = new google.maps.LatLng(50.8452321, 4.3577968,17.29);
    var mapCoordinates = new google.maps.LatLng(50.8452321, 4.3577968,17.29);
    var markers = [];
    var image = new google.maps.MarkerImage(
      'assets/img/map-marker.png',
      new google.maps.Size(84, 70),
      new google.maps.Point(0, 0),
      new google.maps.Point(60, 60)
    );
    function addMarker() {
      markers.push(new google.maps.Marker({
        position: plain,
        raiseOnDrag: false,
        icon: image,
        map: map,
        draggable: false
    }
  }));
    function initialize() {
      var mapOptions = {
        backgroundColor: "#ffffff",
        zoom: 15,
        disableDefaultUI: true,
        center: mapCoordinates,
        zoomControl: false,
        scaleControl: false,
        scrollwheel: false,
        disableDoubleClickZoom: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [{
          "featureType": "landscape.natural",
          "elementType": "geometry.fill",
          "stylers": [{
            "color": "#ffffff"
          }
                     ]
        }
                 , {
                   "featureType": "landscape.man_made",
                   "stylers": [{
                     "color": "#ffffff"
                   }
                               , {
                                 "visibility": "off"
                               }
                              ]
                 }
                 , {
                   "featureType": "water",
                   "stylers": [{
                     "color": "#80C8E5"
                   }
                               , {
                                 "saturation": 0
                               }
                              ]
                 }
                 , {
                   "featureType": "road.arterial",
                   "elementType": "geometry",
                   "stylers": [{
                     "color": "#999999"
                   }
                              ]
                 }
                 , {
                   "elementType": "labels.text.stroke",
                   "stylers": [{
                     "visibility": "off"
                   }
                              ]
                 }
                 , {
                   "elementType": "labels.text",
                   "stylers": [{
                     "color": "#333333"
                   }
                              ]
                 }

                 , {
                   "featureType": "road.local",
                   "stylers": [{
                     "color": "#dedede"
                   }
                              ]
                 }
                 , {
                   "featureType": "road.local",
                   "elementType": "labels.text",
                   "stylers": [{
                     "color": "#666666"
                   }
                              ]
                 }
                 , {
                   "featureType": "transit.station.bus",
                   "stylers": [{
                     "saturation": -57
                   }
                              ]
                 }
                 , {
                   "featureType": "road.highway",
                   "elementType": "labels.icon",
                   "stylers": [{
                     "visibility": "off"
                   }
                              ]
                 }
                 , {
                   "featureType": "poi",
                   "stylers": [{
                     "visibility": "off"
                   }
                              ]
                 }

                ]

      }
          ;
      map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
      addMarker();

    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
</body>

<!-- Mirrored from demo.graygrids.com/themes/classix-template/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2017 11:42:47 GMT -->
</html>
