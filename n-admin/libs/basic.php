<?php
define("BASE",substr(dirname(__FILE__,3),strlen($_SERVER["DOCUMENT_ROOT"]))."/");
define("URL",substr($_SERVER['REQUEST_URI'],strlen(BASE)));

function includestyles($arr=array(BASE.'n-admin/libs/fontawsome/css/all.css',BASE.'n-admin/libs/css/cms.css',BASE.'n-admin/libs/bootstrap/css/bootstrap.min.css')){
  foreach($arr as $stylesheet){
    echo '<link rel="stylesheet" href="'.$stylesheet.'">';
  }
}

function includescripts($arr=array(BASE.'n-admin/libs/js/jquery.js',BASE.'n-admin/libs/js/popper.js',BASE.'n-admin/libs/bootstrap/js/bootstrap.min.js')){
  foreach($arr as $script){
    echo '<script src="'.$script.'" ></script>';
  }
}

function db(){
  return mysqli_connect(DB[0],DB[1],DB[2],DB[3]);
}

function createSelect($data,$value,$ads=""){
  $code="<select ".$ads.">";
  for($i=0; $i<count($data); $i++){
    $selected=($data[$i][1]==$value ? " selected" : "");
    $code.="<option value='".$data[$i][1]."'".$selected.">".$data[$i][0]."</option>";
  }
  return $code."</select>";
}
?>
