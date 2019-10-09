<?php
// Include config file
require_once $_SERVER['DOCUMENT_ROOT'].'/cms_mini/config/config.php';
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// If user is loggedin
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  // Set username
  $username = htmlspecialchars($_SESSION["username"]);
  // Set query
  $sql = 'SELECT id, username, first_name, last_name, description, is_private FROM users WHERE username LIKE "' . $username . '" LIMIT 1';
  // do the query
  $result = $link->query($sql);
  // fetch info for user
  $user_info = $result->fetch_assoc();
} else {
  header("location: /cms_mini/pages/login.php");
  exit();
}

$link->close();
?>
