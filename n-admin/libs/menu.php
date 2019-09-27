<?php

  function checkR($f,$t){
    return ($_SESSION["ncms-ur"]>=$f && $_SESSION["ncms-ur"]<$t);
  }

  function buildMenu(){

    for($i=0; $i<count(LANG["menu"]); $i++){

      if(!checkR(LANG["menu"][$i][2],LANG["menu"][$i][3]))continue;
      $active="";
      if(MODUL==LANG["menu"][$i][1]){
        $active="active";
        define("MODULNAME",LANG["menu"][$i][0]);
      }
      $collapse="collapse ";

      if(isset(LANG["menu"][$i][4])){

        $sub=LANG["menu"][$i][4];
        $ul="";

        for($j=0; $j<count($sub); $j++){

          if(!checkR($sub[$j][2],$sub[$j][3]))continue;

          $subactive="";

          if(MODUL==$sub[$j][1]){

            $subactive="active";
            $active="active";
            define("MODULNAME",$sub[$j][0]);
            $collapse="";

          }
          $ul.="<li class='".$subactive."'><a href='?m=".$sub[$j][1]."'>".$sub[$j][0]."</a></li>";

        }

        $ul='<ul class="'.$collapse.'list-unstyled'.($collapse=="" ? " show":"").'" id="'.LANG["menu"][$i][1].'">'.$ul."</ul>";
        echo "<li class='".$active."'  ><a href='#".LANG["menu"][$i][1]."' data-toggle='collapse' aria-expanded='".($collapse=="" ? "true":"false")."' class='dropdown-toggle'>".LANG["menu"][$i][0]."</a>".$ul."</li>";

      }else{

        if(checkR(LANG["menu"][$i][2],LANG["menu"][$i][3]))echo "<li class='".$active."'><a href='?m=".LANG["menu"][$i][1]."'>".LANG["menu"][$i][0]."</a></li>";

      }

    }

  }
?>
