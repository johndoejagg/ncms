<h1><?php echo MODULNAME ?></h1>
<table class="table table-striped table-sm">
  <tbody>
    <?php
      $con=db();
      $res=mysqli_query($con,"Select ID,name From imageformat");
      while($format=mysqli_fetch_assoc($res)){
        echo "<tr><td><a href='".MURL."&f=edit&ID=".$format["ID"]."'>".$format["name"]."</a></td></tr>";
      }
    ?>
  </tbody>
</table>
