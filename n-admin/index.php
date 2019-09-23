<?php
include "libs/basic.php";
include "../n-config.php";
include "libs/logincheck.php";
if(!isset($_GET["no"])){
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login N-CMS</title>
    <?php includestyles(); ?>
  </head>
  <body>
    <div class="wrapper">
          <!-- Sidebar Holder -->
          <nav id="sidebar" class="bg-dark">
              <div class="sidebar-header bg-primary">
                  <h3>N-CMS</h3>
              </div>

              <ul class="list-unstyled components">
                  <li class="active">
                      <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                      <ul class="collapse list-unstyled" id="homeSubmenu">
                          <li>
                              <a href="#">Home 1</a>
                          </li>
                          <li>
                              <a href="#">Home 2</a>
                          </li>
                          <li>
                              <a href="#">Home 3</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="#">About</a>
                      <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                      <ul class="collapse list-unstyled" id="pageSubmenu">
                          <li>
                              <a href="#">Page 1</a>
                          </li>
                          <li>
                              <a href="#">Page 2</a>
                          </li>
                          <li>
                              <a href="#">Page 3</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="#">Portfolio</a>
                  </li>
                  <li>
                      <a href="#">Contact</a>
                  </li>
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
            <h1>hallo</h1>
          </div>
        </div>
  </body>
  <?php includescripts(); ?>
  <script type="text/javascript">
      $(document).ready(function () {
          $('#sidebarCollapse').on('click', function () {
              $('#sidebar').toggleClass('active');
              $(this).toggleClass('active');
          });
      });
  </script>
</html>
<?php  } ?>
