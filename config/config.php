<?php
include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/libraries/Install.php');

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'lemo');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection and install databases
if($link === false){
  var_dump($link);
  exit();
  // new installation
  $install = new Install();
  $install->createDatabase(DB_NAME);
}
?>
