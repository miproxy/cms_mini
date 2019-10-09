<?php
class Install {
  // FUnction to initialize Database with demo data
  function initDatabase($servername, $username, $password, $db_name) {
      // Create connection
      $link = new mysqli($servername, $username, $password);
      // Check connection
      if ($link->connect_error) {
          die("Connection failed: " . $link->connect_error);
      }

      // Create database
      $sql = "CREATE DATABASE " . $db_name;
      if (mysqli_query($link, $sql)) {
          echo "Database created successfully";
      } else {
          echo "Error creating database: " . mysqli_error($link);
          exit();
      }
      // Break connection
      $link->close();

      $this->createTables($servername, $username, $password, $db_name);
  }

  // function to Create tables
  function createTables($servername, $username, $password, $db_name) {
    // Create connection with DB selected
    $link = new mysqli($servername, $username, $password, $db_name);
    // Check connection
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }

    // Create tables
    // sql to create table users
    $sql_users = "CREATE TABLE users (
      id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(50) COLLATE utf8_general_ci,
      password VARCHAR(255) COLLATE utf8_general_ci,
      first_name VARCHAR(20) COLLATE utf8_general_ci NULL DEFAULT NULL,
      last_name VARCHAR(50) COLLATE utf8_general_ci NULL DEFAULT NULL,
      description TEXT COLLATE utf8_general_ci NULL DEFAULT NULL,
      email VARCHAR(100) COLLATE utf8_general_ci,
      is_private tinyint(1) UNSIGNED NULL DEFAULT 0,
      active tinyint(1) UNSIGNED NULL DEFAULT 0,
      created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
      INDEX(username)
    )";

    if ($link->query($sql_users) === TRUE) {
        echo "Table users created successfully";
    } else {
        echo "Error creating table: " . $link->error;
    }

    // sql to create table groups
    $sql_groups = "CREATE TABLE groups (
      id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(20) COLLATE utf8_general_ci,
      description VARCHAR(100) COLLATE utf8_general_ci
    )";

    if ($link->query($sql_groups) === TRUE) {
        echo "Table groups created successfully";
    } else {
        echo "Error creating table: " . $link->error;
    }

    // sql to create table users_groups
    $sql_users_groups = "CREATE TABLE users_groups (
      id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      user_id INT(11) UNSIGNED NOT NULL,
      group_id INT(11) UNSIGNED NOT NULL
    )";

    if ($link->query($sql_users_groups) === TRUE) {
        echo "Table users_groups created successfully";
    } else {
        echo "Error creating table: " . $link->error;
    }

    $link->close();
  }

  function initDemoData() {

  }
}
?>
