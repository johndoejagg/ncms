<?php
  function buildMenu(){

    for($i=0; $i<count(LANG["menu"]); $i++){

      $active="";
      if(MODUL==LANG["menu"][$i][1]){
        $active="active";
        define("MODULNAME",LANG["menu"][$i][0]);
      }
      $collapse="collapse ";

      if(isset(LANG["menu"][$i][2])){

        $sub=LANG["menu"][$i][2];
        $ul="";

        for($j=0; $j<count($sub); $j++){

          $subactive="";

          if(MODUL==LANG["menu"][$i][1]."/".$sub[$j][1]){

            $subactive="active";
            $active="active";
            define("MODULNAME",$sub[$j][0]);
            $collapse="";

          }

          $ul.="<li class='".$subactive."'><a href='?m=".LANG["menu"][$i][1]."/".$sub[$j][1]."'>".$sub[$j][0]."</a></li>";

        }

        $ul=$ul='<ul class="'.$collapse.'list-unstyled'.($collapse=="" ? " show":"").'" id="'.LANG["menu"][$i][1].'">'.$ul."</ul>";
        echo "<li class='".$active."'  ><a href='#".LANG["menu"][$i][1]."' data-toggle='collapse' aria-expanded='".($collapse=="" ? "true":"false")."' class='dropdown-toggle'>".LANG["menu"][$i][0]."</a>".$ul."</li>";

      }else{

        echo "<li class='".$active."'><a href='?m=".LANG["menu"][$i][1]."'>".LANG["menu"][$i][0]."</a></li>";

      }

    }

  }
?>
