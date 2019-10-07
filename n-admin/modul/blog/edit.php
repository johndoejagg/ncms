<?php
  echo '<script>var contents=[{type:"headline",val:"hallo",var:1},{type:"text",text:"<p>hallo</p><p>du</p>"}]; var title=""; var LANG='.json_encode(LANG).';</script>';
  includestyles(array(BASE."n-admin/libs/content/css/content.css",BASE."n-admin/libs/summernote/summernote-bs4.css"));
  includescripts(array(BASE."n-admin/libs/content/js/content.js",BASE."n-admin/libs/content/js/sidebar.js",BASE."n-admin/libs/summernote/summernote-bs4.min.js"));
?>
  <div id="navextend">
    <div id="contentButtons">
      <div class="left">
        <button id="btn_add" class="btn bg-dark text-white"><i class="fas fa-plus-square"></i></button>
      </div>
      <div class="right">
        <button id="btn_save" class="btn"><?php echo LANG["save"]; ?></button>
        <button id="btn_publish" class="btn bg-primary text-white"><?php echo LANG["publish"]; ?></button>
      </div>
    </div>
  </div>
  <?php include "libs/content/php/template.php"; ?>
  <?php include "libs/content/php/addbuttons.php" ?>
  <div id="contentbuilder"></div>
</div>
<div id="sidebarright">
  <button id="toggleRightSidebar">
    <i class="fas fa-cog"></i>
  </button>
  <div class="content">test bla blatest bla blatest bla bla</div>
