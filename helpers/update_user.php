<?php
// Include config file
require_once $_SERVER['DOCUMENT_ROOT'].'/cms_mini/config/config.php';
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$sql = "UPDATE users
        SET first_name  ='".$_POST["first_name"]."',
            last_name   ='".$_POST["last_name"]."',
            description ='".$_POST["description"]."',
            is_private     ='".$_POST["private"]."'
        WHERE id=".$_POST["user_id"];

if ($link->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $link->error;
}

$link->close();
 ?>
