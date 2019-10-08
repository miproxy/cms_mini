<!-- Include home controller -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/controllers/home_controller.php') ?>
<!-- Include header -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/components/header.php') ?>
<!-- Include main layout (navigation...) -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/main_layer.php') ?>
<h3 class="pb-4"><b>View all public users</b></h3>
<table id="public-users-table" class="display" style="width:100%">
  <thead>
    <tr>
      <td>First Name</td>
      <td>Last Name</td>
      <td>Username</td>
      <td>Email</td>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($users as $user) {
        echo "<tr><td>" . $user['first_name'] . "</td><td>" . $user['last_name'] . "</td><td>" . $user['username'] . "</td><td>" . $user['email'] . "</td></tr>";
      }
     ?>
  </tbody>
</table>

<script>
  $(document).ready(function() {
    Main.init();
  });
</script>

<!-- Include footer -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/components/footer.php') ?>
