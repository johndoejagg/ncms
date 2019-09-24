<?php
include "libs/cms_core.php";

if(!isset($_GET["no"])){
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>N-CMS</title>
    <?php includestyles(); ?>
    <?php includescripts(); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
  </head>
  <body>
    <div class="wrapper">
          <!-- Sidebar Holder -->
          <nav id="sidebar" class="bg-dark">
              <div class="sidebar-header bg-primary">
                  <h3>N-CMS</h3>
              </div>

              <ul class="list-unstyled components">
                  <?php buildMenu() ?>
              </ul>
              <a class="logout" href="logout.php"><i class="fas fa-sign-out-alt"></i> logout</a>
          </nav>

          <!-- Page Content Holder -->
          <div id="content">
            <nav>
              <button type="button" id="sidebarCollapse" class="navbar-btn">
                <span></span><span></span><span></span>
              </button>
            </nav>
            <?php echo MODULNAME; getModul(); ?>
          </div>
        </div>
  </body>
</html>
<?php  }else{
  getModul();
} ?>
