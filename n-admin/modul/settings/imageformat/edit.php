<?php
  if($_GET["ID"]!="new"){
    $con=db();
    $format=mysqli_fetch_assoc(mysqli_query($con,"Select ID, name, width, height, cropmode FROM imageformat WHERE ID=".mysqli_real_escape_string($con,$_GET["ID"])));
  }
?>
<form action="<?php echo MURL ?>&f=save&no=1" method="post">
  <div class="form-group">
  <h2><?php echo $format["name"]; ?></h2>
 </div>
  <div class="form-group">
   <label for="InputWidth"><?php echo LANG["width"] ?></label>
   <input name="width" value="<?php echo $format["width"]; ?>" class="form-control" id="InputWidth" placeholder="<?php echo LANG["width"] ?>">
 </div>
 <div class="form-group">
  <label for="InputHeight"><?php echo LANG["height"] ?></label>
  <input name="height" value="<?php echo $format["height"]; ?>" class="form-control" id="InputHeight" placeholder="<?php echo LANG["height"] ?>">
</div>
<div class="form-group">
 <label for="InputCrop"><?php echo LANG["cropMode"] ?></label>
 <?php echo createSelect(LANG["cropModes"],$format["cropmode"],'name="cropmode" class="form-control" id="InputCrop"'); ?>
</div>


<input type="hidden" name="ID" id="ID" value="<?php echo $format["ID"] ?>">
<button type="submit" class="btn bg-primary text-white mt-3 mr-3"><?php echo LANG["save"]; ?></button>
<div class="msg bg-danger text-white p-3 mt-3" style="display:none"></div>
</form>

<script>
  $(document).ready(function(){
    $("form").submit(function(e){
      e.preventDefault();
      if($("#ID").val()=="new" && $("#InputPassword1").val()==""){
        $(".msg").text("<?php echo LANG["errorPasswordMissing"] ?>").show();
      }else{
        if($("#InputPassword1").val()!=$("#InputPassword2").val()){
          $(".msg").text("<?php echo LANG["errorPasswordsNotMatching"] ?>").show();
        }else{
          if($("#InputName").val()!=""){
            var ser=$("form").serialize();
            var action=$("form").attr("action");
            $.post(action,ser).done(function(e){
              if(e=="OKOK"){
                document.location.href="<?php echo MURL; ?>";
              }else{
                $(".msg").text(e).show();
              }
            })
        }else{
          $(".msg").text("<?php echo LANG["errorUserNameCantBeEmpty"] ?>").show();
        }
      }
    }


    });
  });
</script>
