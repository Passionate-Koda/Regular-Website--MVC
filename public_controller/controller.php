<?php
// define("DB_PATH", dirname(dirname(__FILE__)));
// include DB_PATH."/models/model.php";

function getFrontage($dbconn){
  $stmt = $dbconn->prepare("SELECT * FROM frontage");

  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    echo '<li class="tp-revslider-slidesli active-revslide current-sr-slide-visible" data-slotamount="7" data-masterspeed="2000" data-thumb="'.$image.'" data-delay="10000" data-saveperformance="on">

    <img src="'.$image.'" alt="laptopmockup_sliderdy" data-lazyload="'.$image.'" data-bgposition="right top" data-duration="12000" data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100" data-bgpositionend="center bottom">

    <div class="tp-caption largeHeadingWhite customin customout tp-resizeme rs-parallaxlevel-0 start" data-x="center" data-y="center" data-voffset="-80" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-speed="1200" data-start="1550" data-easing="Back.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="400" data-endeasing="Back.easeIn" style="z-index: 11;">
    <h1 style="text-align: center; min-height: 0px; min-width: 0px; line-height: 94px; border-width: 0px; margin: 0px 0px 20px; padding: 0px; letter-spacing: 2px; font-size: 50px; text-transform: uppercase; font-weight: 700; color: #fff;">'.$header_title.'</h1>
    </div>

    <div class="tp-caption detailText p lft tp-resizeme rs-parallaxlevel-0 start" data-x="center" data-y="center" data-voffset="0" data-speed="1200" data-start="2100" data-easing="easeInOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 11;">
    <p style="min-height: 0px; min-width: 0px; line-height: 30px; border-width: 0px; margin: 0px 0px 20px; padding: 0px; letter-spacing: 0px; font-size: 14px; color: #fff; text-align: center;">'.$text.'</p>
    </div>


    </li>';
  }

}


function addComment($dbconn, $get,$post){
  $rnd = rand(0000000000,9999999999);
  $split = explode(" ",$post['author']);
  $id = $rnd.$split['0'];
  $hash_id = 'comment'.str_shuffle($id);
  $stmt = $dbconn->prepare("INSERT INTO comments VALUES(NULL, :bl,:cmb,:cm,NOW(),NOW(),:hid)");
  $stmt->bindParam(":bl", $get);
  $stmt->bindParam(":cmb", $post['author']);
  $stmt->bindParam(":cm", $post['comment']);
  $stmt->bindParam(":hid", $hash_id);
  $stmt->execute();

}

function getComment($dbconn, $get){

  $stmt = $dbconn->prepare("SELECT * FROM comments WHERE blog=:hid ");
  $stmt->bindParam(":hid", $get);
  $stmt->execute();

  while($row = $stmt->fetch(PDO::FETCH_BOTH)){

    extract($row);

    echo ' <li>
     <div class="media">

     <div class="info-body">
     <div class="media-heading">
     <h4 class="name">'.$comment_by.'</h4> |
     <span class="comment-date">'.$date_created.'</span>
     </div>
     <p>'.$comment.'</p>
     </div>
     </div>
     </li>';
  }
}

function getCommentCount($dbconn, $hid){

  $stmt = $dbconn->prepare("SELECT * FROM comments WHERE blog=:hid ");
  $stmt->bindParam(":hid", $hid);
  $stmt->execute();
  $count = $stmt->rowCount();

  // die(var_dump($count));
  return $count;

}


function getProject($dbconn){
  $stmt = $dbconn->prepare("SELECT * FROM project");
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    echo '<div class="item">
    <div class="product-item">
    <div class="carousel-thumb">
    <img src="'.$image.'" alt="">
    <div class="overlay">
    <a href="'.$project_link.'"><i class="fa fa-link"></i></a>
    </div>
    </div>
    <a href="'.$project_link.'" class="item-name">'.$project_name.'</a>
    </div>
    </div>';
  }
}

function getList($dbconn, $pn){
  $result = [];
  $stmt = $dbconn->prepare("SELECT * FROM package WHERE package_name = :pn");
  $stmt->bindParam(":pn", $pn);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
    echo '<li><i class="fa fa-check-square"></i>'.$package_list.'</li>';

  }

}

function getPackages($dbconn){
  $stmt = $dbconn->prepare("SELECT * FROM package_name");

  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
  $pcount = count($package_name);
       for($i=0;$i<$pcount;$i++){
         echo "<div class=\"col-sm-4 wow fadeInDownQuick\" data-wow-delay=\"0s\">";
         echo "<div class=\"table wow\">";
         echo "<div class=\"title\">
         <h3>$package_name</h3>
         </div>
         <div class=\"pricing-header\">
         <p class=\"price-value\">Features</p>
         <p class=\"price-quality\">for this Package</p>";
         echo "</div>
         <ul class=\"description\" >";
          getList($dbconn,$package_name);
         echo "</ul>
         <a href=\"quote?package=$hash_id\">
         <button class=\"btn btn-common\" type=\"submit\">Request Quote</button>
         </a>
         </div>
         </div>";
 }

  }

}

function getPackageNameByHash($dbconn,$get){
  $stmt = $dbconn->prepare("SELECT * FROM package_name WHERE hash_id = :hid");
  $stmt->bindParam(":hid", $get);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_BOTH);
    return $row;
}

  function getRecentPost($dbconn, $number){
    $stmt = $dbconn->prepare("SELECT * FROM blog ORDER BY id DESC LIMIT $number ");

    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_BOTH)){
      extract($row);
      echo '<li>
      <div class="widget-thumb">
      <a href="blog?hsh='.$hash_id.'"><img width="100px" height="100px" src="'.$image_1.'" alt="" /></a>
      </div>
      <div class="widget-content">
      <a href="blog?hsh='.$hash_id.'">'.$title.'</a>
      <span><i class="icon-calendar"></i>'.$date_created.'</span>
      </div>
      <div class="clearfix"></div>
      </li>';
    }
  }
  function getPost($dbconn){
    $stmt = $dbconn->prepare("SELECT * FROM blog");

    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_BOTH)){
      extract($row);
        $pcount = count($body);
           for($i=0;$i<$pcount;$i++){
             $cnt = getCommentCount($dbconn, $hash_id);
      $prev_body = previewBody($body, 30);
      echo '<div class="blog-post">

      <div class="post-thumb">

      <a href="blog?hsh='.$hash_id.'"><div style="width:100%; height:60vh; background-image:url('.$image_1.'); background-size:cover; background-position:center; background-repeat:no-repeat;"></div></a>
      <div class="hover-wrap">
      </div>
      </div>


      <div class="post-content">
      <h4 class="post-title"><a href="blog?hsh='.$hash_id.'">'.$title.'</a></h4>
      <div class="meta">
      <span class="meta-part"><a href="#"><i class="fa fa-user"></i> '.$title.'</a></span>
      <span class="meta-part"><a href="#"><i class="fa fa-clock-o"></i> '.$date_created.'</a></span>
      <span class="meta-part"><a href="#"><i class="fa fa-comment"></i> Comments '.$cnt.'</a></span>
      </div>
      <p>'.$prev_body.'…</p>
      <a href="blog?hsh='.$hash_id.'" class="btn btn-common btn-rm">Read More</a>
      </div>

      </div>';
    }
  }
  }

  function previewBody($string, $count){
    $original_string = $string;
    $words = explode(' ', $original_string);

    if(count($words) > $count){
      $words = array_slice($words, 0, $count);
      $string = implode(' ', $words);
    }
    return $string;
  }



  function getArticleColumn($dbconn,$hid){
    $stmt = $dbconn->prepare("SELECT * FROM blog WHERE hash_id = :hid");
    $stmt->bindParam(":hid", $hid);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_BOTH);
    extract($row);
    $column = explode("<br>", $body);

    return $column;
   }



  function getArticle($dbconn,$hid){
    $stmt = $dbconn->prepare("SELECT * FROM blog WHERE hash_id = :hid");
    $stmt->bindParam(":hid", $hid);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_BOTH);
    return $row;
   }
  function getProjectList($dbconn){
    $stmt = $dbconn->prepare("SELECT * FROM project");
    $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_BOTH)){
    extract($row);
  echo '<tr>
  <td class="add-img-td">
  <a href="ads-details.html">
  <img class="img-responsive" src="'.$image.'" alt="img">
  </a>
  </td>
  <td class="ads-details-td">
  <h4><a target="_blank" href="'.$project_link.'">'.$project_name.'</a></h4>
  <p> <strong>'.$about.'</strong></p>
  </td>
  <td class="price-td">
    <a target="_blank" href="'.$project_link.'">
     <button class="btn btn-common" type="submit">View Project</button>
    </a>
  </td>
  </tr>';
   }
}




 ?>
