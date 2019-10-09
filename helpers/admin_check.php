 <?php
 // Include config file
 require_once $_SERVER['DOCUMENT_ROOT'].'/cms_mini/config/config.php';
 /* Attempt to connect to MySQL database */
 $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

 $username = (isset($_SESSION['username'])) ? $_SESSION['username'] : false;

 $sql = "SELECT users.id, users_groups.group_id
         FROM users
         LEFT JOIN users_groups
         ON users.id = users_groups.user_id
         AND users.username = '" . $username . "'
         LIMIT 1";

 // do the query
 $result = $link->query($sql);
 // fetch info for user
 $user_info = $result->fetch_assoc();

 $is_admin = ($user_info['group_id'] == 1) ? true : false;

 $link->close();
?>
