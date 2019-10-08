<?php
// Include config file
require_once $_SERVER['DOCUMENT_ROOT'].'/cms_mini/config/config.php';

// Set query
$sql = 'SELECT id, username, first_name, last_name, email FROM users WHERE is_private NOT LIKE 1';
// do the query
$result = $link->query($sql);
// fetch info for users
$i = 0;
while($row = $result->fetch_assoc()) {
  $users[$i] = array( 'user_id'    => $row['id'],
                      'username'   => $row['username'],
                      'first_name' => $row['first_name'],
                      'last_name'  => $row['last_name'],
                      'email'      => $row['email']);
  $i++;
}

$link->close();
 ?>
