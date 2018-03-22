<?php

require 'connect.inc.php';
require 'core.inc.php';
if (isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
	echo 'you\'re logged in.'.$_SESSION['user_name']. '<br><a href="logout.php">Log out</a>';

$user_name=$_SESSION['user_name'];


}
else{
	
include 'loginform.inc.php';
}

mysql_query("SET NAMES utf8");

?>
<form action="foititesform.php" method="POST" >
ΒΑΛΕ  ΚΩΔΙΚΟ ΜΑΘΗΜΑΤΟΣ:<input type="text" name="testpass">
<input type="submit" name="submit"   >  
</form>
<?php

if(isset($_POST['testpass'])){
	
	$testpass=$_REQUEST['testpass'];
	$_SESSION['testpass']=$testpass;
	$_SESSION['user_name']=$user_name;
	$_SESSION ['user_id']=$user_id;
	header ('Location: quiz.php');
}
?>



