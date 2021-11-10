
<?php
if (session_status() === PHP_SESSION_ACTIVE)
session_destroy();
echo 'You have been logged out. <a href="http://localhost/lods1/login.php">Go back</a>';
?>