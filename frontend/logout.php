<?php 
session_start();
unset($_SESSION['LOGIN']);
unset($_SESSION['NAME']);
unset($_SESSION['ID']);

header('location:index.php');
die();


?>