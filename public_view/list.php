<?php

$state = $conn->prepare("SELECT * FROM package WHERE package_name = :pn");
$state->bindParam(":pn", $_POST['pn']);
$state->execute();
      while($row = $state->fetch(PDO::FETCH_BOTH)){
        extract($row);
        echo '<li><i class="fa fa-check-square"></i>'.$package_list.'</li>';
      }

 ?>
