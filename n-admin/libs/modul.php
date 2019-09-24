<?php
  function getModul(){
    $m=(isset($_GET["m"]) ? $_GET["m"] : $GLOBALS["lang"]->menu[0][1] );
    $f=(isset($_GET["f"]) ? $_GET["f"]."php" : "index.php" );
    $inc="modul/".$m."/".$f;
    include $inc;
  }
?>
