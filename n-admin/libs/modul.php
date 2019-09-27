<?php

  $m=(isset($_GET["m"]) ? $_GET["m"] : ($_SESSION["ncms-ur"]<4 ? LANG["menu"][0][1] : "settings/user"));
  $f=(isset($_GET["f"]) ? $_GET["f"].".php" : "index.php" );
  define("MODUL",$m);
  define("MURL","?m=".$m);
  define("MF","&f=".$f);

  function getModul(){
    checkRoleRights();
    $inc="modul/".$GLOBALS["m"]."/".$GLOBALS["f"];
    include $inc;
  }

  function checkRoleRights(){
    if(MODUL!="settings/user"){
      $found=false;
      for($i=0; $i<count(LANG["menu"]) && $found==false; $i++){
        if(LANG["menu"][$i][1]==MODUL){
          checkRole(LANG["menu"][$i][2],LANG["menu"][$i][3]);
          $found=true;
          break;
        }
        if(isset(LANG["menu"][$i][4])){
          for($j=0; $j<count(LANG["menu"][$i][4]) && $found==false; $j++){
            $sub=LANG["menu"][$i][4][$j];
            if($sub[1]==MODUL){
              checkRole($sub[2],$sub[3]);
              $found=true;
              break;
            }
          }
        }
      }
    }
  }

  function checkRole($f,$t){
    if(!($_SESSION["ncms-ur"]>=$f && $_SESSION["ncms-ur"]<$t))die(LANG["errorNotAllowed"]);
  }

?>
