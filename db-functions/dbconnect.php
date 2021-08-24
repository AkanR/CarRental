<?php
ob_start();
session_start();
$conn  = mysqli_connect("localhost","root","","carrental");
require_once 'helperfunction.php';
require_once 'common.php';
?>