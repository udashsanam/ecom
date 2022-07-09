<?php
session_start();

$host="localhost";
$user="root";
$password='';
$db='ecom';
$con=mysqli_connect($host,$user,$password,$db);
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/ecom/');
define('SITE_PATH','http://localhost/ecom/frontend/');
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/media/product/');
define('PRODUCT_IMAGE_SITE_PATH','http://localhost/ecom/media/');



?>