<?php

  define("BROWSDIR",$_GET["dir"]);

  function listDir($dir){
      echo "dir:",$dir."\n";
      if ($handle = opendir("upload/".$dir)) {

        while (false !== ($entry = readdir($handle))) {

            if ($entry != ".") {

                echo "$entry\n";
            }
        }

        closedir($handle);
    }
  }

  function createDir(){
    $new=BROWSDIR.$_GET["n"];
    if(!file_exists($new)){
      mkdir($new);
      listDir($new);
    }else{
      echo "Error:Directory already exisists.";
    }

  }

  $action=$_GET["a"];
  if($action=="list")listDir(BROWSDIR);
  if($action=="createDir")createDir();
 ?>
