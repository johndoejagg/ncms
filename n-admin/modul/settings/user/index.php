<h1><?php echo MODULNAME ?></h1>
<a href="<?php echo MURL; ?>?f=edit&ID=new" class="btn bg-primary text-white mb-3"><?php echo LANG["newUser"]; ?></a>
<table class="table table-striped table-sm">
  <tbody>
    <?php
      $con=db();
      $res=mysqli_query($con,"Select ID,name From user");
      while($user=mysqli_fetch_assoc($res)){
        echo "<tr><td><a href='".MURL."&f=edit&ID=".$user["ID"]."'>".$user["name"]."</a></td></tr>";
      }
    ?>
  </tbody>
</table>
