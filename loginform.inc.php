<?php
require 'core.inc.php';
mysql_query("SET NAMES utf8");
if(isset($_POST['username'])&&isset($_POST['password']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	
if(!empty($username)&&!empty($password))
{
$query="SELECT id, typos,name FROM pruser  WHERE  username='$username' AND password='$password'";
$query_run = mysql_query($query);
if($row=mysql_fetch_array($query_run)){
	if($user_perm='KA'){

		$user_id = $row['id'];
		$_SESSION ['user_id']=$user_id;
		$_SESSION ['user_perm']=$row["typos"];
		$user_name=$row['name'];
		$_SESSION['user_name']=$user_name;
		header ('Location: kathigitesform.php');
	}
}


$query="SELECT id,typos,name FROM users  WHERE  kas='$username' AND password='$password'";
$query_run = mysql_query($query);
if($row=mysql_fetch_array($query_run)){
if($user_perm='F'){
		$user_id = $row['id'];
		$_SESSION ['user_id']=$user_id;
		$_SESSION ['user_perm']=$row["typos"];
		$user_name=$row['name'];
		$_SESSION['user_name']=$user_name;
		header ('Location: foititesform.php');
}
		}
else{
	echo 'you must supply a username and password.';
}


	
}
		else
{
echo 'you must supply a username and password.';
}	
}




?>
<form action="<?php echo $current_file;?>"
method="POST";>
Username:<input type="text" name="username">
Password:<input type="password"  name="password">

<input type="submit" value="login">
</form>
