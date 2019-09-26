<?php
session_start();
$_SESSION["ncms-user"]="";
$_SESSION["ncms-password"]="";
$_SESSION["ncms-ur"]="";
$_SESSION["ncms-id"]="";

header("Location: index.php");
 ?>
