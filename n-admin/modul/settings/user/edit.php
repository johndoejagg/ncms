<?php
  if($_GET["ID"]!="new"){
    $con=db();
    $user=mysqli_fetch_assoc(mysqli_query($con,"Select ID, name, role, email FROM user WHERE ID=".mysqli_real_escape_string($con,$_GET["ID"])));
  }else{
    $user=array();
    $user["ID"]="new";
    $user["email"]="";
    $user["role"]=0;
    $user["name"]=LANG["newUser"];
  }
?>
<form action="<?php echo MURL ?>&f=save&no=1" method="post">
  <div class="form-group">
   <label for="InputUser1"><?php echo LANG["userName"] ?></label>
   <input name="name" value="<?php echo $user["name"]; ?>" class="form-control" id="InputUser1" placeholder="<?php echo LANG["userName"] ?>">
 </div>
  <div class="form-group">
   <label for="InputEmail1"><?php echo LANG["eMail"] ?></label>
   <input name="email" value="<?php echo $user["email"]; ?>" class="form-control" id="InputEmail1" placeholder="<?php echo LANG["eMail"] ?>">
 </div>
  <div class="form-group">
   <label for="InputPassword1"><?php echo LANG["newPassword"] ?></label>
   <input name="password" type="password" class="form-control" id="InputPassword1" placeholder="<?php echo LANG["newPassword"] ?>">
 </div>
 <div class="form-group">
  <label for="InputPassword2"><?php echo LANG["repeatPassword"] ?></label>
  <input type="password" class="form-control" id="InputPassword2" placeholder="<?php echo LANG["repeatPassword"] ?>">
</div>
<div class="form-group" <?php if($_SESSION["ncms-ur"]!=0) echo "style='display:none'"; ?>>
 <label for="InputRole1"><?php echo LANG["userRole"] ?></label>
 <?php echo createSelect(LANG["userRoles"],$user["role"],'name="role" class="form-control" id="InputRole1"'); ?>
</div>
<input type="hidden" name="ID" id="ID" value="<?php echo $user["ID"] ?>">
<button type="submit" class="btn bg-primary text-white mt-3"><?php echo LANG["save"]; ?></button>
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
          if($("#InputUser1").val()!=""){
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
