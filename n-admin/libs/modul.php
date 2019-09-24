<?php

  $m=(isset($_GET["m"]) ? $_GET["m"] : $GLOBALS["lang"]->menu[0][1] );
  $f=(isset($_GET["f"]) ? $_GET["f"]."php" : "index.php" );
  define("MODUL",$m);
  define("MURL","?m=".$m);
  define("MF","&f=".$f);

  function getModul(){
    $inc="modul/".$GLOBALS["m"]."/".$GLOBALS["f"];
    include $inc;
  }
  
?>
