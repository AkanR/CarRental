<?php require 'db-functions/dbconnect.php'; ?>
<?php
session_unset();
session_destroy();
$location = "./index.php";
redirect($location);
?>