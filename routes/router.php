<?php
$uri = explode("/", $_SERVER['REQUEST_URI']);
//var_dump($uri);

if(count($uri)> 2){
  header("Location:/admin_home");
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




switch ($uri[1]) {
  case "admin":
  include APP_PATH."/views/admin/adminlogin.php";
  break;

  case "":
  include APP_PATH."/views/public/public_home.php";
  break;

  case "/":
  include APP_PATH."/views/public/public_home.php";
  break;













  ///////Public Routes//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





}





?>
