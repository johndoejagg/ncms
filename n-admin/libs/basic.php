<?php
define("BASE",substr(dirname(__FILE__,2),strlen($_SERVER["DOCUMENT_ROOT"]))."/");
define("URL",substr($_SERVER['REQUEST_URI'],strlen(BASE)));

function includestyles(){
  echo '<link rel="stylesheet" href="'.BASE.'n-admin/libs/fontawsome/css/all.css"><link rel="stylesheet" href="'.BASE.'n-admin/libs/bootstrap/css/bootstrap.min.css">';
}

function includescripts(){
  echo '<script src="'.BASE.'n-admin/libs/jquery.js"></script><script src="'.BASE.'n-admin/libs/popper.js"></script><script src="'.BASE.'n-admin/libs/bootstrap/js/bootstrap.min.js" ></script>';
}
?>
