<?php
session_start();
$_SESSION["ncms-user"]="";
$_SESSION["ncms-password"]="";
header("Location: index.php");
 ?>
