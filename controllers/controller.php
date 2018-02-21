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



 function compressImage($files, $name, $quality, $upDIR ) {

   $rnd = rand(0000000, 9999999);
   $strip_name = str_replace(" ", "_", $_FILES[$name]['name']);

   $filename = $rnd.$strip_name;
   $destination_url = $upDIR.$filename;

   $info = getimagesize($files[$name]['tmp_name']);

         if ($info['mime'] == 'image/jpeg')
               $image = imagecreatefromjpeg($files[$name]['tmp_name']);

         elseif ($info['mime'] == 'image/gif')
               $image = imagecreatefromgif($files[$name]['tmp_name']);

       elseif ($info['mime'] == 'image/png')
               $image = imagecreatefrompng($files[$name]['tmp_name']);

         imagejpeg($image, $destination_url, $quality);

   return $destination_url;
 }


 function addFrontage($dbconn,$post,$destination,$sess){
   $stmt = $dbconn->prepare("INSERT INTO frontage VALUES(NULL, :ht,:txt,:img,NOW(),NOW(),:sess)");
   $data = [
     ':ht' => $post['header_title'],
     ':txt' => $post['txt'],
     ':img' => $destination,
     ':sess' => $sess
   ];
   $stmt->execute($data);
   $success = "Frontage Info Added";
   $succ = preg_replace('/\s+/', '_', $success);

   header("Location:/manageViews?success=$succ");
 }

 function addBlog($dbconn,$post,$destn, $sess){
   $rnd = rand(0000000000,9999999999);
   $split = explode(" ",$post['title']);
   $id = $rnd.$split['0'];
   $hash_id = 'blog'.str_shuffle($id);
   $stmt = $dbconn->prepare("INSERT INTO blog VALUES(NULL, :tt,:au,:vis,:bd,:img1,:img2,:sess,NOW(),NOW(),:hsh)");
   $data = [
     ':tt' => $post['title'],
     ':au' => $post['author'],
     ':vis' => $post['visibility'],
     ':bd' => $post['body'],
     ':img1' => $destn['a'],
     ':img2' => $destn['b'],
     ':sess' => $sess,
     ':hsh' => $hash_id
   ];
   $stmt->execute($data);
   $success = "Blog Post Uploaded";
   $succ = preg_replace('/\s+/', '_', $success);

   header("Location:/addBlog?success=$succ");
 }

 function addProject($dbconn,$post,$destn, $sess){
   $rnd = rand(0000000000,9999999999);
   $split = explode(" ",$post['title']);
   $id = $rnd.$split['0'];
   $hash_id = 'blog'.str_shuffle($id);
   $stmt = $dbconn->prepare("INSERT INTO blog VALUES(NULL, :tt,:au,:vis,:bd,:img1,:img2,:sess,NOW(),NOW(),:hsh)");
   $data = [
     ':tt' => $post['title'],
     ':au' => $post['author'],
     ':vis' => $post['visibility'],
     ':bd' => $post['body'],
     ':img1' => $destn['a'],
     ':img2' => $destn['b'],
     ':sess' => $sess,
     ':hsh' => $hash_id
   ];
   $stmt->execute($data);
   $success = "Blog Post Uploaded";
   $succ = preg_replace('/\s+/', '_', $success);

   header("Location:/addBlog?success=$succ");
 }

 function addProfile($dbconn,$post,$destn,$sess){
   $profile_status = 1;
   $stmt = $dbconn->prepare("UPDATE admin SET firstname=:fn,lastname=:ln,portfolio=:pt,bio=:bi,phone_number=:pn,facebook_link=:fbl,twitter_link=:tlk,linkedin_link=:llk,instagram_link=:iglk,location=:lct,image_1=:img1,image_2=:img2,image_3=:img3,profile_status=:ps WHERE hash_id=:sess");

     $stmt->bindParam(":fn",$post['fname']);
     $stmt->bindParam(":ln",$post['lname']);
     $stmt->bindParam(":pt",$post['portfolio']);
     $stmt->bindParam(":bi",$post['bio']);
     $stmt->bindParam(":pn",$post['phonenumber']);
     $stmt->bindParam(":fbl",$post['fblink']);
     $stmt->bindParam(":tlk",$post['twlink']);
     $stmt->bindParam(":llk",$post['lklink']);
     $stmt->bindParam(":iglk",$post['iglink']);
     $stmt->bindParam(":lct",$post['location']);
     $stmt->bindParam(":img1",$destn['a']);
     $stmt->bindParam(":img2",$destn['b']);
     $stmt->bindParam(":img3",$destn['c']);
     $stmt->bindParam(":ps",$profile_status);
     $stmt->bindParam(":sess",$sess);

   $stmt->execute();




   $success = "Profile Successfully Uploaded";
   $succ = preg_replace('/\s+/', '_', $success);

   header("Location:/addProfile?success=$succ");
 }


 function adminInfo($dbconn,$sess){
   $stmt = $dbconn->prepare("SELECT hash_id,firstname,lastname,profile_status FROM admin WHERE hash_id = :sid");
   $data = [
     ':sid' => $sess
   ];
   $stmt->execute($data);
   $row = $stmt->fetch(PDO::FETCH_BOTH);
   return $row;
 }





 ?>
