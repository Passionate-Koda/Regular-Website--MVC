<?php
define("DB_PATH", dirname(dirname(__FILE__)));
include DB_PATH."/models/model.php";



// function to check Email;
function doesEmailExist($dbconn, $input){ #placeholders are just there
  $result = false;
  $stmt = $dbconn -> prepare("SELECT * FROM admin WHERE email = :em");
  $stmt->bindParam(":em",$input);
  $stmt->execute();
  $count = $stmt->rowCount();
  if($count>0){
    $result = true;
  }
  return $result;
}

function displayErrors($error, $field)
{
  $result= "";
  if (isset($error[$field]))
  {
    $result = '<span style="color:red">'.$error[$field].'</span>';
  }
  return $result;
}

 function decodeHashId($dbconn,$table,$hash_id){
   $stmt = $dbconn->prepare("SELECT id FROM $table WHERE hash_id = :hid ");
   $stmt->bindParam(":hid", $hash_id);
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_BOTH);
   return $row['id'];
 }

 function doAdminRegister($dbconn, $input){
   $rnd = rand(0000000000,9999999999);
   $hash_id = 'admin'.$rnd;

   $hash = password_hash($input['pword'], PASSWORD_BCRYPT);
   #insert data
   $stmt = $dbconn->prepare("INSERT INTO admin(firstname,lastname,email,hash,hash_id,time_created,date_created) VALUES(:fn, :ln, :e, :h,:hid,NOW(),NOW())");

   #bind params...
   $data = [ ':fn' => $input['firstname'],
   ':ln' => $input['lastname'],
   ':e' => $input['email'],
   ':h' => $hash,
   ':hid' => $hash_id
 ];

 $stmt->execute($data);
$suc = 'Registration Successful';
 $message = preg_replace('/\s+/', '_', $suc);
 header("Location:adminRegistration?success=$message");
 }

 function adminLogin($dbconn, $input){
   $stmt = $dbconn->prepare("SELECT * FROM admin WHERE email = :e ");

   $stmt ->bindParam(":e", $input['email']);
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_BOTH);
   if($stmt->rowCount() !=1 || !password_verify($input['pword'], $row['hash'])){
     $suc = 'Invalid Email or Password';
      $message = preg_replace('/\s+/', '_', $suc);
      header("Location:adminLogin?err=$message");
   }else{
     $verification = 1;
     $statement = $dbconn->prepare("SELECT * FROM admin WHERE email = :e AND verification=:ver ");
     $statement ->bindParam(":e", $input['email']);
     $statement ->bindParam(":ver", $verification);
     $statement->execute();

     if($statement->rowCount() !=1){
       $state = $dbconn->prepare("SELECT * FROM admin WHERE email = :e ");
       $state ->bindParam(":e", $input['email']);
        $state->execute();
       $row = $state->fetch(PDO::FETCH_BOTH);
       extract($row);
       $suc = 'Dear '.ucwords($firstname).', You Have Not been Verified as Mckodev Admin';
        $message = preg_replace('/\s+/', '_', $suc);
        header("Location:adminLogin?wn=$message");
     }else{
       extract($row);
       $_SESSION['id'] = $hash_id;
       header("Location:admin");
     }
   }
 }








 ?>
