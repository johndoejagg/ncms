<?php
  $con=db();

  if(isset($_GET["confirm"])){
    if($_SESSION["ncms-ur"]==0 || $_SESSION["ncms-id"]==$_GET["ID"]){
      $admins=mysqli_num_rows(mysqli_query($con,"Select * FROM user WHERE role=0 AND ID!=".mysqli_real_escape_string($con,$_GET["ID"])));
      if($admins>0){
        mysqli_query($con,"DELETE FROM `user` WHERE `user`.`ID` = ".mysqli_real_escape_string($con,$_GET["ID"]));
        header("Location:".MURL);
      }else{
        die(LANG["errorCantDeleteLastAdmin"]);
      }
    }else{
      die(LANG["errorNotAllowed"]);
    }
  }
?>
<h1>
  <?php
    $res=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user WHERE ID=".mysqli_real_escape_string($con,$_GET["ID"])));
    echo LANG["headline_deleteUser"]." ".$res["name"];
  ?>
</h1>
<a class="btn bg-primary text-white mr-3" href="<?php echo MURL; ?>"><?php echo LANG["cancel"] ?></a>
<a class="btn bg-danger text-white" href="<?php echo MURL; ?>&f=delete&confirm=1&ID=<?php echo $_GET["ID"] ?>"><?php echo LANG["confirm"] ?></a>
