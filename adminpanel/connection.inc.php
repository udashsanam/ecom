<?php
session_start();


$con=mysqli_connect("localhost","root","","ecom"); // database connection query 

define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/ecom/'); // defining the constant path for the progrom
define('SITE_PATH','http://localhost/ecom/');
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/media/'); // defining the constant path for the progrom
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'/media/');
 // defining the constant path for the progrom

?>