<?php
ob_start();

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

$current_file=$_SERVER['SCRIPT_NAME'];
$http_referer='http://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/foititesform.php';
  

 
?>