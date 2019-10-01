<!-- Include welcome controller -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/controllers/welcome_controller.php') ?>
<!-- Include header -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/components/header.php') ?>
<!-- Include main layout (navigation...) -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/main_layer.php') ?>

<div class="page-header">
     <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
</div>
<p>
   <a href="/cms_mini/pages/reset_password.php" class="btn btn-warning">Reset Your Password</a>
   <a href="/cms_mini/controllers/logout_controller.php" class="btn btn-danger">Sign Out of Your Account</a>
</p>

<!-- Include footer -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/components/footer.php') ?>
