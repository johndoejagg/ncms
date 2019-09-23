<?php

session_start();
include "libs/basic.php";
include "../n-config.php";

if(isset($_GET["check"])){
  $con=mysqli_connect(DB[0],DB[1],DB[2],DB[3]);
  $name=mysqli_real_escape_string($con,$_POST["username"]);
  $password=md5($_POST["password"]);
  $res=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `user` WHERE `name`='".$name."' AND `password`='".$password."'"));
  if($res==1){
    $_SESSION["ncms-user"]=$name;
    $_SESSION["ncms-password"]=$password;
    header("Location:".BASE."n-admin/");
  }
}
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login N-CMS</title>
    <?php includestyles(); ?>
    <style>
    * {box-sizing: border-box;}
    .input-container {
      display: flex;
      width: 100%;
      margin-bottom: 15px;
    }
    .icon {
      padding: 10px;
      line-height: 26px;
      background: dodgerblue;
      color: white;
      min-width: 50px;
      text-align: center;
    }
    .input-field {
      width: 100%;
      padding: 10px;
      outline: none;
    }
    .input-field:focus {
      border: 2px solid dodgerblue;
    }
    .btn{
      width:100%;
    }
  </style>
  </head>
  <body>
    <div class="container bg-dark text-white p-3" style="max-width:350px; margin-top:100px">
      <h1>Login</h1>
      <form action="?check=1" method="post">
        <div class="input-container">
          <i class="fa fa-user icon"></i>
          <input class="input-field" placeholder="Username" name="username">
        </div>
        <div class="input-container">
          <i class="fa fa-key icon"></i>
          <input class="input-field"name="password" type="password">
        </div>
        <button class="btn bg-primary text-white" type="submit">login</button>
      </form>
    </div>
  </body>
  <?php includescripts(); ?>
</html>
