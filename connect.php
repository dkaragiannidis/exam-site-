<?php 
if(!mysql_connect("localhost","root","")||!mysql_select_db('')){
	die('problem');
}else{
	echo 'connected<br>';
}$connection= mysql_connect("","","");
echo 'conected<br>';
mysql_select_db("users",$connection);


?>