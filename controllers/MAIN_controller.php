<?php
  if(!isset($_SESSION))
  {
      session_start();
  }
  // Check admin and set variable value
  include($_SERVER['DOCUMENT_ROOT'].'/cms_mini/helpers/admin_check.php');
?>
