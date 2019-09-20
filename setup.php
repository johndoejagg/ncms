<?php
  include "libs/basic.php";
  $step=1;
  if(file_exists("n-config.php")){
    include("n-config.php");
    $step=2;
    $con=mysqli_connect(DB[0],DB[1],DB[2],DB[3]);
    if($con){
      $res=mysqli_num_rows(mysqli_query($con,"Select * FROM user"));
      if($res!=0)die("ERROR! setup locked, n-config.php and a user exists. please <a href='".BASE."n-admin/'>login</a>");
    }else{
      echo "<di class='msg'>cant connect to db! n-config.php exists... Please check it.</div>";
    }
  }
  if(isset($_GET["db"])){
    if($step!=2){
      $dbs=json_decode($_POST["db"]);
      $con=mysqli_connect($dbs->host,$dbs->user,$dbs->password);
      if($con){
        $db_selected=mysqli_select_db($con,$dbs->name);
        if(!$db_selected){
          if(mysqli_query($con,'CREATE DATABASE '.$dbs->name)){
            writeConfig($dbs);
          }else{
            echo "Could not create/find Database, please do it your own";
          }
        }else{
          writeConfig($dbs);
        }
      }else{
        echo "connection failed, check username and password";
      }
      die();
    }else{
      die("n-config.php already exists. you cant save db settings.");
    }
  }

  function writeConfig($dbs){
    if(!file_exists("n-config.php")){
      $string="<?php define('DB',array('".$dbs->host."','".$dbs->user."','".$dbs->password."','".$dbs->name."')); ?".">";
      $myfile = fopen("n-config.php", "w") or die("Unable to create config file! Please create /n-config.php wíth the content:<div style='padding:5px; border:1px solid #333'>".htmlspecialchars($string)."</div>");
      fwrite($myfile, $string);
      fclose($myfile);
    }
    echo "OKOK";
  }

  if(isset($_GET["user"])){
    $user=json_decode($_POST["user"]);
    if(mysqli_query($con,"INSERT INTO `user` (`ID`, `name`, `password`, `email`) VALUES (NULL, '".$user->name."', MD5('".$user->password."'), '".$user->email."');")){
      echo die("Install complete :D setup is now locked. please <a href='".BASE."n-admin/'>login</a>");
    }else{
      echo "Could not create/find Database, please do it your own";
    }
    die();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <?php includestyles(); ?>
  <style>
  * {box-sizing: border-box;}

  .msg{
    padding:5px; margwhitein:20px 0; background:#000; color:#fff;
  }
  /* Style the input container */
  .input-container {
    display: flex;
    width: 100%;
    margin-bottom: 15px;
  }

  /* Style the form icons */
  .icon {
    padding: 10px;
    background: dodgerblue;
    color: white;
    min-width: 50px;
    text-align: center;
  }

  /* Style the input fields */
  .input-field {
    width: 100%;
    padding: 10px;
    outline: none;
  }

  .input-field:focus {
    border: 2px solid dodgerblue;
  }

  /* Set a style for the submit button */
  .btn {
    background-color: dodgerblue;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }

  .btn:hover {
    opacity: 1;
  }
</style>
</head>
<body>
  <div class="container mt-3 p-3 bg-dark text-white">
    <h1>N-CMS setup</h1>

    <div class="step 1" <?php if($step==2) echo "style='display:none'" ?>>
      <h2>Step 1: Database</h2>
      <form>
        <div class="input-container">
          <i class="fa fa-database icon"></i>
          <input class="input-field" placeholder="DB Host" value="localhost" id="db_host">
        </div>
        <div class="input-container">
          <i class="fa fa-database icon"></i>
          <input class="input-field" placeholder="DB Name" value="ncms" id="db_name">
        </div>
        <div class="input-container">
          <i class="fa fa-user icon"></i>
          <input class="input-field" placeholder="DB User" id="db_user">
        </div>
        <div class="input-container">
          <i class="fa fa-key icon"></i>
          <input class="input-field" placeholder="DB password" id="db_password">
        </div>
        <button class="btn" type="submit">next</button>
      </form>
    </div>

    <div class="step 2"  <?php if($step==1) echo "style='display:none'" ?>>
      <h2>Step 2: User</h2>
      <form>
        <div class="input-container">
          <i class="fa fa-user icon"></i>
          <input class="input-field" placeholder="Username" value="admin" id="username">
        </div>
        <div class="input-container">
          <i class="fa fa-key icon"></i>
          <input class="input-field" placeholder="Password" id="password">
        </div>
        <div class="input-container">
          <i class="fa fa-envelope icon"></i>
          <input class="input-field" placeholder="E-Mail" id="email">
        </div>
        <button class="btn" type="submit">next</button>
      </form>
    </div>

  </div>
  <?php includescripts(); ?>
  <script>
    $(document).ready(function(){
      $(".step.1 form").submit(function(e){
        e.preventDefault();
        var db={host:$("#db_host").val(), name:$("#db_name").val(), user:$("#db_user").val(), password:$("#db_password").val()};
        $.ajax({method:"post", url:"?db=1", data:{db:JSON.stringify(db)}}).done(function(e){
          if(e=="OKOK"){
            $(".step.1").hide();
            $(".step.2").show();
          }else{
            $(".step.1").append("<div class='msg'>"+e+"</div>");
          }
        });
      });

      $(".step.2 form").submit(function(e){
        e.preventDefault();

        if($("#password").val()!=""){
          var user={name:$("#username").val(), password:$("#password").val(), email:$("#email").val()};
          var db={host:$("#db_host").val(), name:$("#db_name").val(), user:$("#db_user").val(), password:$("#db_password").val()};
          $.ajax({method:"post", url:"?user=1", data:{user:JSON.stringify(user),db:JSON.stringify(db)}}).done(function(e){
              $(".step.2").append("<div class='msg'>"+e+"</div>");
          });
        }else{
          $(".step.2").append("<div class='msg'>Please enter a password</div>");
        }

      });

    });
  </script>
</body>
