<?php
ob_start();
$page_name = "|Blog";
include("include/header.php");
$info = getArticle($conn,$_GET['hsh']);


extract($info);


if(array_key_exists('submit', $_POST)){

addComment($conn, $_GET['hsh'], $_POST);
$msg = [];
$msg['done'] = "Comment Posted";
}


 ?>


 <div id="content">
 <div class="container">
 <div class="row">
   <?php if (isset($msg['done'])){
     echo '<div class="col-md-12">
   <div class="inner-box posting">
   <div class="alert alert-success alert-lg" role="alert">
   <h2 class="postin-title">✔ Successful! '.$msg['done'].' </h2>
   <p>Thank you, McKodev is happy to have you around. </p>
   </div>
   </div>
   </div>';
   } ?>
 <div class="col-md-8">

 <div class="blog-post single-post">

 <div class="post-thumb">
 <a href="#"><img src="<?php echo $image_1 ?>" alt=""></a>
 <div class="hover-wrap">
 </div>
 </div>


 <div class="post-content">
 <h4 class="post-title"><a href="#"><?php echo $title ?></a></h4>
 <div class="meta">
 <span class="meta-part"><a href="#"><i class="fa fa-user"></i> <?php echo $author ?></a></span>
 <span class="meta-part"><a href="#"><i class="fa fa-clock-o"></i> <?php echo $date_created ?></a></span>
 <span class="meta-part"><a href="#"><i class="fa fa-comment"></i> Comments <?php $cnt = getCommentCount($conn, $_GET['hsh']); echo $cnt; ?></a></span>
 </div>
 <p><?php getArticleColumn($conn,$_GET['hsh'],0) ?></p>
 <br>
 <p><?php getArticleColumn($conn,$_GET['hsh'],1) ?></p>
 <br>
 <!-- <blockquote>
 <span class="quote-text">
 To explore strange new worlds to seek out new life and new civilizations to boldly go where no man has gone before
 </span>
 <p><a href="#">- Alfred Marshel</a></p>
 </blockquote> -->
 <div class="row">
 <div class="col-sm-6">
 <p><?php getArticleColumn($conn,$_GET['hsh'],2) ?></p>
 </div>
 <div class="col-sm-6">
 <img src="<?php echo $image_2 ?>" alt="">
 </div>
 </div>
 <br>
 <p><?php getArticleColumn($conn,$_GET['hsh'],3) ?></p>
 </div>

 </div>


 <!-- <div class="author">
 <div class="inner-box">
 <div class="author-img">
 <img src="assets/img/blog/author.jpg" alt="">
 </div>
 <div class="author-text">
 <div class="author-title">
 <h3 class="pull-left">William Smith</h3>
 <div class="social-link pull-right">
 <a class="twitter" target="_blank" data-original-title="twitter" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a>
 <a class="facebook" target="_blank" data-original-title="facebook" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a>
 <a class="google" target="_blank" data-original-title="google-plus" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-google"></i></a>
 <a class="linkedin" target="_blank" data-original-title="linkedin" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a>
 </div>
 </div>
 <br>
 <p>We've been waiting for you. Where the kisses are hers and hers and his three too Michaea
 Knight a young loner on a crusade to champion the cause of innocent is the tale of our castaways they are here for a logn logn time for a courage.</p>
 </div>
 </div>
 </div> -->


 <div id="comments">
 <div class="inner-box">

 <h3>Comments (<?php $cnt = getCommentCount($conn, $_GET['hsh']); echo $cnt; ?> )</h3>
 <ol class="comments-list">
   <?php getComment($conn, $_GET['hsh']) ?>
 <!-- <li>
 <div class="media">

 <div class="info-body">
 <div class="media-heading">
 <h4 class="name">Larsen Mortin</h4> |
 <span class="comment-date">Mar 02, 2017</span>
 <a href="#" class="reply-link"><i class="fa fa-reply-all"></i> Reply</a>
 </div>
 <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
 </div>
 </div>
 </li> -->

 </ol>

 <div id="respond">
 <h2 class="respond-title">Comment This Post</h2>
 <form action="" method="post">
 <div class="row">
 <div class="col-md-6">
 <div class="form-group">
 <input  class="form-control" name="author" type="text" value="" size="30" required placeholder="Your Name *">
 </div>
 </div>
 <div class="col-md-6">
 </div>

 </div>
 <div class="row">
 <div class="col-md-12">
 <div class="form-group">
 <textarea  class="form-control" name="comment" cols="45" rows="8" required placeholder="Comment...Please Be Polite With your Comments"></textarea>
 </div>
 <input type="submit" class="btn btn-common" name="submit" value="submit">
 </div>
 </div>
 </form>
 </div>

 </div>
 </div>

 </div>

 <aside id="sidebar" class="col-md-4 right-sidebar">

   <div class="widget widget-popular-posts">
   <div class="widget-title">
   <h4>Recent Posts</h4>
   </div>
   <ul class="posts-list">

   <?php getRecentPost($conn, 3); ?>
  </ul>
  </div>


 <div class="inner-box">
 <div class="widget-title">
 <h4>Advertisement</h4>
 </div>
 <img src="assets/img/img1.jpg" alt="">
 </div>


 </aside>

 </div>
 </div>
 </div>




<?php
include("include/footer.php");

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

<!-- Mirrored from demo.graygrids.com/themes/classix-template/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2017 11:42:46 GMT -->
</html>
