<?php
$uri = explode("/", $_SERVER['REQUEST_URI']);
//var_dump($uri);

if(count($uri)> 2){
  header("Location:/admin");
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




switch ($uri[1]) {


  case "":
include APP_PATH."/views/admin/admin_home.php";
  break;

  case "/":
include APP_PATH."/views/admin/admin_home.php";
  break;



  case "addBlog":
  include APP_PATH."/views/admin/add_blog.php";
  break;

  case "addBlog?success=$success":
  include APP_PATH."/views/admin/add_blog.php";
  break;

  case "addFaq":
  include APP_PATH."/views/admin/add_faq.php";
  break;

  case "addPackage":
  include APP_PATH."/views/admin/add_package.php";
  break;

  case "addProfile":
  include APP_PATH."/views/admin/add_profile.php";
  break;

  case "addProfile?success=$success":
  include APP_PATH."/views/admin/add_profile.php";
  break;

  case "addProject":
  include APP_PATH."/views/admin/add_project.php";
  break;

  case "addProject?success=$success":
  include APP_PATH."/views/admin/add_project.php";
  break;

  case "adminRegistration":
  include APP_PATH."/views/admin/add_admin.php";
  break;

  case "adminRegistration?success=$success":
  include APP_PATH."/views/admin/add_admin.php";
  break;

  case "adminLogin?wn=$wn":
  include APP_PATH."/views/admin/admin_login.php";
  break;

  case "adminLogin?sgn=$sgn":
  include APP_PATH."/views/admin/admin_login.php";
  break;

  case "adminLogin?err=$err":
  include APP_PATH."/views/admin/admin_login.php";
  break;

  case "adminLogin":
  include APP_PATH."/views/admin/admin_login.php";
  break;

  case "admin":
  include APP_PATH."/views/admin/admin_home.php";
  break;

  case "manageViews":
  include APP_PATH."/views/admin/manage_views.php";
  break;

  case "manageViews?success=$success":
  include APP_PATH."/views/admin/manage_views.php";
  break;













  ///////Public Routes//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





}





?>
