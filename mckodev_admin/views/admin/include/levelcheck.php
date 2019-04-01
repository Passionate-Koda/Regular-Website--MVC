<?php
$level = adminLevel($conn, $_SESSION['id']);
if($level < 5){
  $success = "You only Have Access to that page yet";
  $succ = preg_replace('/\s+/', '_', $success);
  header("Location: addProfile?wrn=$succ");
}
 ?>
