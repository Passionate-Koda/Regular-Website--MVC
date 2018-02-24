<?php
$uri = explode("/", $_SERVER['REQUEST_URI']);
//var_dump($uri);

if(count($uri)> 2){
  header("Location:/home");
}

//Creating A Null variable to be populated for the query String Route;
$category_id = NULL;
$category_name= NULL;

//Creating a $_GET condition to populate the Null Variables;
if(isset($_GET['id'])){
  $category_id = $_GET['id'];
}

$msg = NULL;
if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
}
if(isset($_GET['name'])){
  $category_name = $_GET['name'];
}
$success = NULL;
if(isset($_GET['success'])){
  $success = $_GET['success'];
}

$err = NULL;
if(isset($_GET['err'])){
  $err = $_GET['err'];
}

$wn = NULL;
if(isset($_GET['wn'])){
  $wn = $_GET['wn'];
}

$sgn = NULL;
if(isset($_GET['sgn'])){
  $sgn = $_GET['sgn'];
}

$hsh = NULL;
if(isset($_GET['hsh'])){
  $hsh = $_GET['hsh'];
}




switch ($uri[1]) {


  case "":
include APP_PATH."/public_view/index.php";
  break;

  case "home":
include APP_PATH."/public_view/index.php";
  break;

  case "/":
include APP_PATH."/public_view/index.php";
  break;
  case "list":
include APP_PATH."/public_view/list.php";
  break;

  case "packages":
include APP_PATH."/public_view/packages.php";
  break;

  case "profile":
include APP_PATH."/public_view/profile.php";
  break;

  case "quote":
include APP_PATH."/public_view/request_quote.php";
  break;

  case "profile?hsh=hsh":
include APP_PATH."/public_view/profile.php";
  break;

  case "projects":
include APP_PATH."/public_view/mckodev_projects.php";
  break;

  case "contact":
include APP_PATH."/public_view/contact.php";
  break;

  case "blog":
include APP_PATH."/public_view/blog.php";
  break;

  case "blog?hsh=$hsh":
include APP_PATH."/public_view/blog_articles.php";
  break;

  case "projects":
include APP_PATH."/public_view/mckodev_projects.php";
  break;






  ///////Public Routes//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





}





?>
