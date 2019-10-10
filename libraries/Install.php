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
      // Create tables
      $this->createTables($servername, $username, $password, $db_name);
      // Init Demo data
      $this->initDemoData($servername, $username, $password, $db_name);
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

  // Initialization of DEMO data
  function initDemoData($servername, $username, $password, $db_name) {
    // Create connection with DB selected
    $link = new mysqli($servername, $username, $password, $db_name);
    // Check connection
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }
    // Aadmin password
    $admin_password = password_hash("admin123", PASSWORD_DEFAULT);
    // Password for all demo users is 123456
    $password = password_hash("123456", PASSWORD_DEFAULT);
    // Set admin account
    $sql = "INSERT INTO users (id, username, password, first_name, last_name, description, email, is_private, active)
            VALUES ('1', 'admin', '$admin_password', 'Admin', 'istrator', 'Glavni Korisnik', 'admin@demo.com', 1, 1);";
    // Set public users
    $sql .= "INSERT INTO users (id, username, password, first_name, last_name, description, email, is_private, active)
            VALUES ('2', 'usermarko', '$password', 'Marko', 'Petrovic', 'Korisnik Marko', 'marko@demo.com', 0, 1);";
    $sql .= "INSERT INTO users (id, username, password, first_name, last_name, description, email, is_private, active)
            VALUES ('3', 'usernikola', '$password', 'Nikola', 'Novakovic', 'Korisnik Nikola', 'nikola@demo.com', 0, 1);";
    $sql .= "INSERT INTO users (id, username, password, first_name, last_name, description, email, is_private, active)
            VALUES ('4', 'usermilan', '$password', 'Milan', 'Jovanovic', 'Korisnik Milan', 'milan@demo.com', 0, 1);";
    $sql .= "INSERT INTO users (id, username, password, first_name, last_name, description, email, is_private, active)
            VALUES ('5', 'userjovan', '$password', 'Jovan', 'Miletic', 'Korisnik Jovan', 'jovan@demo.com', 0, 1);";
    $sql .= "INSERT INTO users (id, username, password, first_name, last_name, description, email, is_private, active)
            VALUES ('6', 'userdusan', '$password', 'Dusan', 'Tosic', 'Korisnik Dusan', 'dusan@demo.com', 0, 1);";
    // Set private users
    $sql .= "INSERT INTO users (id, username, password, first_name, last_name, description, email, is_private, active)
            VALUES ('7', 'userzoran', '$password', 'Zoran', 'Pavlovic', 'Korisnik Zoran', 'zoran@demo.com', 1, 1);";
    $sql .= "INSERT INTO users (id, username, password, first_name, last_name, description, email, is_private, active)
            VALUES ('8', 'userveljko', '$password', 'Veljko', 'Slavkovic', 'Korisnik Veljko', 'veljko@demo.com', 1, 1);";
    $sql .= "INSERT INTO users (id, username, password, first_name, last_name, description, email, is_private, active)
            VALUES ('9', 'usergoran', '$password', 'Goran', 'Radenkovic', 'Korisnik Goran', 'goran@demo.com', 1, 1);";
    // Set user groups
    $sql .= "INSERT INTO groups (id, name, description)
            VALUES ('1', 'admin', 'Administrator of page');";
    $sql .= "INSERT INTO groups (id, name, description)
            VALUES ('2', 'user', 'General user');";
    // Set user roles
    $sql .= "INSERT INTO users_groups (user_id, group_id) VALUES ('1', '1');";
    $sql .= "INSERT INTO users_groups (user_id, group_id) VALUES ('2', '2');";
    $sql .= "INSERT INTO users_groups (user_id, group_id) VALUES ('3', '2');";
    $sql .= "INSERT INTO users_groups (user_id, group_id) VALUES ('4', '2');";
    $sql .= "INSERT INTO users_groups (user_id, group_id) VALUES ('5', '2');";
    $sql .= "INSERT INTO users_groups (user_id, group_id) VALUES ('6', '2');";
    $sql .= "INSERT INTO users_groups (user_id, group_id) VALUES ('7', '2');";
    $sql .= "INSERT INTO users_groups (user_id, group_id) VALUES ('8', '2');";
    $sql .= "INSERT INTO users_groups (user_id, group_id) VALUES ('9', '2')";

    if ($link->multi_query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }

    $link->close();
  }
}
?>
