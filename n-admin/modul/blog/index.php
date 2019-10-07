<h1><?php echo LANG["blogEntryHeadline"] ?></h1>
<a href="<?php echo MURL; ?>&f=edit&ID=new" class="btn bg-primary text-white mb-3"><?php echo LANG["newBlogEntry"]; ?></a>
<table class="table table-striped table-sm">
  <tbody>
    <?php
      $con=db();
      $res=mysqli_query($con,"Select ID,name From content");
      while($content=mysqli_fetch_assoc($res)){
        echo "<tr><td><a href='".MURL."&f=edit&ID=".$content["ID"]."'>".$content["name"]."</a></td></tr>";
      }
    ?>
  </tbody>
</table>
