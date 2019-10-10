<?php
  require_once  $_SERVER['DOCUMENT_ROOT'].'/cms_mini/controllers/MAIN_controller.php';

  // Redirect user to home page if he try to access this page and he is not an admin
  if(!$is_admin) {
    header("location: /cms_mini");
    exit();
  }

  // Include config file
  require_once $_SERVER['DOCUMENT_ROOT'].'/cms_mini/config/config.php';
  /* Attempt to connect to MySQL database */
  $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  // Set query
  $sql = 'SELECT id, username, first_name, last_name, email, is_private, active FROM users';
  // do the query
  $result = $link->query($sql);
  // fetch info for users
  $i = 0;
  while($row = $result->fetch_assoc()) {
    $users[$i] = array( 'user_id'    => $row['id'],
                        'username'   => $row['username'],
                        'first_name' => $row['first_name'],
                        'last_name'  => $row['last_name'],
                        'email'      => $row['email'],
                        'is_private' => $row['is_private'],
                        'active'     => $row['active']);
    $i++;
  }

  $link->close();

 ?>
