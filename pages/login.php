<!-- Include login controller -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/controllers/login_controller.php') ?>
<!-- Include header -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/components/header.php') ?>
<!-- Include main layout (navigation...) -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/main_layer.php') ?>

<div class="wrapper">
    <h2>Login</h2>
    <p>Please fill in your credentials to login.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
        <div class="form-group <?php echo (!empty($active_err)) ? 'has-error' : ''; ?>">
            <span class="help-block"><?php echo $active_err; ?></span>
        </div>
        <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
    </form>
</div>

<!-- Include footer -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/components/footer.php') ?>
