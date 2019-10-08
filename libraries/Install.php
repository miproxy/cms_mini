<?php
class Install {
  function createDatabase($db_name) {
      // Create database
      $sql = "CREATE DATABASE " . $db_name;
      if (mysqli_query($link, $sql)) {
          echo "Database created successfully";
      } else {
          echo "Error creating database: " . mysqli_error($conn);
      }
  }

  function createTables() {

  }

  function initData() {

  }
}
?>
