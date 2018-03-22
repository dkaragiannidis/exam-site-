<?php 

if(!mysql_connect("","","")||!mysql_select_db('')){
	die('problem');
}else{

}$connection= mysql_connect("","","");

mysql_query("SET NAMES utf8");
//if(isset($_POST['math'])&&isset($_POST['ontest'])&&!empty($_POST['math'])&&!empty($_POST['ontest'])){
$math=$_POST['math'];
	    $ontest=$_POST['ontest'];
		$_SESSION['user_name']=$user_name;
 
	

	if(strlen($math))
	{
 	$query="INSERT INTO arxeiomathimatos (name,mathima,test) VALUES('$user_name','$math','$ontest')";
	echo $query;
	mysql_query($query);
	}
	
//$query="INSERT INTO arxeiomathimatos (id,name,mathima,test) VALUES(NULL,$_SESSION['user_name'],$_POST['math'],$_POST['ontest'])";


?>
<form action='loginform2.inc.php' method='POST'>
ΑΝ ΘΕΛΕΤΕ ΝΑ ΔΗΜΙΟΥΡΓΗΣΕΤΕ ΤΕΣΤ ΠΑΤΗΣΤΕ ΕΔΩ <br><input type='submit' name='arxmath' value='ΔΗΜΙΟΥΡΓΙΑ ΑΡΧΕΙΟΥ ΜΑΘΗΜΑΤΟΣ'></br>
</form>
<?php
if(isset($_POST['arxmath'])){
	?>
<form>
δημιουργεια αρχειου μαθηματος <input type=text name='math'>
δημιουργεια titlou test <input type=text name='ontest'>
<input type='submit' value='Submit'>
</form>
	<?php
}

	?>

