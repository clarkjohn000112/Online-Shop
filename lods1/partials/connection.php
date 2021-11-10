<?php 

define('SITEURL', 'http://localhost/lods1');
define('SITEURL1', 'http://localhost/lods1/');
define('LOCALHOST','localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'secret_shop');
$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);
$_SESSION['cart']= "";?>