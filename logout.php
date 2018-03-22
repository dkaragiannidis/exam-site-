 <?php
require 'core.inc.php';
session_destroy();
header ('Location:'.$http_referer);

  function loggedin() {
	if (isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
		return true;
	}else {
		return false;
	}
 }

 
?>
