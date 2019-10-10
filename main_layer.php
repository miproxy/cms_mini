<!-- Include MAIN controller -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/controllers/MAIN_controller.php') ?>
<!-- BEGIN Navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">MINI CMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/cms_mini">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php
        if ($is_admin) {
          ?>
          <li class="nav-item active">
            <a class="nav-link" href="/cms_mini/pages/members">Members <span class="sr-only">(current)</span></a>
          </li>
          <?php
        }
       ?>
    </ul>
    <ul class="navbar-nav ml-auto">
      <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
          ?>
          <li class="nav-item dropdown active">
           <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
           </a>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="/cms_mini/pages/profile">My Profile</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="/cms_mini/controllers/logout_controller.php">Log Out</a>
           </div>
          </li>
          <?php
        } else {
          echo '<li class="nav-item active"><a class="nav-link" href="/cms_mini/pages/login">Login / Register <span class="sr-only">(current)</span></a></li>';
        }
      ?>
    </ul>
  </div>
</nav>
<!-- END Navigation -->
<!-- BEGIN Main content -->
<main id="main" role="main" class="container p-3">
