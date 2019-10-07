<?php

  $con=db();
  $id=mysqli_real_escape_string($con,$_POST["ID"]);
  $role=mysqli_real_escape_string($con,$_POST["role"]);
  $name=mysqli_real_escape_string($con,$_POST["name"]);
  $email=mysqli_real_escape_string($con,$_POST["email"]);
  $password=($_POST["password"]!="" ? md5($_POST["password"]) : "");

  if($_SESSION["ncms-ur"]!=0){
    if($id!=$_SESSION["ncms-id"]){
      die(LANG["errorNotAllowed"]);
    }
  }

  if($id=="new"){
    if($_SESSION["ncms-ur"]==0){
      checkName($con,$name,0);
      if($password=="")die(LANG["errorPasswordMissing"]);
      $res=mysqli_query($con,"INSERT INTO `user` (`ID`, `name`, `password`, `email`, `role`) VALUES (NULL, '".$name."', '".$password."', '".$email."', '".$role."');");
      die("OKOK");
    }else{
      die(LANG["errorNotAllowedToCreateUser"]);
    }
  }else{
    checkName($con,$name,$id);
    $passwordupdate=($password!="" ?  "`password` = '".$password."'," : "" );
    $roleupdate=($_SESSION["ncms-ur"]==0 ? ", `role` = '".$role."'" : "");
    $res=mysqli_query($con,"UPDATE `user` SET `name` = '".$name."',".$passwordupdate." `email` = '".$email."'".$roleupdate." WHERE `user`.`ID` = ".$id.";");
    die("OKOK");
  }

  function checkName($con,$name,$id){
    $res=mysqli_num_rows(mysqli_query($con,"Select * FROM user WHERE `name`='".$name."' AND `ID`!=".$id));
    if($res==1)die(LANG["errorUserNameAlreadyInUse"]);
  }
?>
