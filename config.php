<?php
  session_start();
  
  define('LOCALHOST', 'localhost');
  define('ROOT', 'root');
  define('PASSWORD', '');
  define('DATABASE', 'php_login_db');
  define('SITEURL', 'http://localhost/php-log-in/');

  $conn = mysqli_connect(LOCALHOST,ROOT,PASSWORD,DATABASE) or die(mysqli_error('Failed to connect!'));
  $db_select = mysqli_select_db($conn,DATABASE)  or die(mysqli_error('Failed to connect!'));

?>