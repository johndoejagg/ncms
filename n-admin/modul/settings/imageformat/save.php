<?php

  $con=db();
  $id=mysqli_real_escape_string($con,$_POST["ID"]);
  $width=mysqli_real_escape_string($con,$_POST["width"]);
  $height=mysqli_real_escape_string($con,$_POST["height"]);
  $cropmode=mysqli_real_escape_string($con,$_POST["cropmode"]);

  $res=mysqli_query($con,"UPDATE `imageformat` SET `width` = '".$width."',`height` = '".$height."',`cropmode` = '".$cropmode."' WHERE `imageformat`.`ID` = ".$id.";");
  die("OKOK");
?>
