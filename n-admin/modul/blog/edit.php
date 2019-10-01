<?php
  echo '<script>var contents=[{type:"headline",val:"hallo",var:1}]; var title=""; var LANG='.json_encode(LANG).';</script>';
  includestyles(array(BASE."n-admin/libs/content/css/content.css"));
  includescripts(array(BASE."n-admin/libs/content/js/content.js",BASE."n-admin/libs/content/js/sidebar.js"));
?>
  <div id="navextend">
    <div id="contentButtons">
      <button class="btn"><?php echo LANG["save"]; ?></button>
      <button class="btn bg-primary text-white"><?php echo LANG["publish"]; ?></button>
    </div>
  </div>
  <?php include "libs/content/php/template.php"; ?>
  <div id="contentbuilder"></div>
</div>
<div id="sidebarright">
  <button id="toggleRightSidebar">
    <i class="fas fa-cog"></i>
  </button>
  <div class="content">test bla blatest bla blatest bla bla</div>
