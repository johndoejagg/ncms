<?php
  session_start();
  if(isset($_SESSION["ncms-user"])){
    $con=mysqli_connect(DB[0],DB[1],DB[2],DB[3]);
    $name=$_SESSION["ncms-user"];
    $password=$_SESSION["ncms-password"];
    $res=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `user` WHERE `name`='".$name."' AND `password`='".$password."'"));
    if($res!=1){
      redirLogin();
    }
  }else{
    redirLogin();
  }
  function redirLogin(){
    header("Location: ".BASE."n-admin/login.php");
    die();
  }
?>
