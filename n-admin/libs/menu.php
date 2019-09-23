<?php
  function buildMenu(){

    $lang=$GLOBALS["lang"];

    for($i=0; $i<count($lang->menu); $i++){

      $active="";
      if(isset($_GET["m"]) && $_GET["m"]==$lang->menu[$i][1])$active="active";
      $collapse="collapse ";

      if(isset($lang->menu[$i][2])){

        $sub=$lang->menu[$i][2];
        $ul="";

        for($j=0; $j<count($sub); $j++){

          $subactive="";

          if(isset($_GET["m"]) && $_GET["m"]==$lang->menu[$i][1]."/".$sub[$j][1]){

            $subactive="active";
            $active="active";
            $collapse="";

          }

          $ul.="<li class='".$subactive."'><a href='?m=".$lang->menu[$i][1]."/".$sub[$j][1]."'>".$sub[$j][0]."</a></li>";

        }

        $ul=$ul='<ul class="'.$collapse.'list-unstyled'.($collapse=="" ? " show":"").'" id="'.$lang->menu[$i][1].'">'.$ul."</ul>";
        echo "<li class='".$active."'  ><a href='#".$lang->menu[$i][1]."' data-toggle='collapse' aria-expanded='".($collapse=="" ? "true":"false")."' class='dropdown-toggle'>".$lang->menu[$i][0]."</a>".$ul."</li>";

      }else{
        echo "<li class='".$active."'><a href='?m=".$lang->menu[$i][1]."'>".$lang->menu[$i][0]."</a></li>";
      }
    }
  }
?>
