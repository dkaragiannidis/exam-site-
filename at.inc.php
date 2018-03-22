<form action='kathigitesform.php' method='POST'>

<br><input type='submit' name='testcr' value='ΔΗΜΙΟΥΡΓΙΑ ΤΕΣΤ'></br>
</form>
<?php
if (isset($_POST['testcr'])){
echo $math;
	?>
	

	<form action='kathigitesform.php' method='POST'>
	<br>test password<input type=text name='testpass'>
	<br>titlos test<input type=text name='ontest'>
	<br><br> ΒΑΛΤΕ ΕΔΩ ΤΗΝ ΕΡΩΤΗΣΗ<input type=text name='question'  >
<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 1 ΕΠΙΛΟΓΗ<input type=text name='choice1'>
<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 2 ΕΠΙΛΟΓΗ<input type=text name='choice2'>
<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 3 ΕΠΙΛΟΓΗ<input type=text name='choice3'>	
	<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 4 ΕΠΙΛΟΓΗ<input type=text name='choice4'>
	<input type='submit' name="+" value='+'>
	<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ  ΣΩΣΤΗ ΕΠΙΛΟΓΗ<input type=text name='rightAns'>
	<input type='submit' value='Submit'>
	</form>

	<?php	
	
	}
if(isset($_POST['question'])&&isset($_POST['choice1'])&&isset($_POST['choice2'])&&isset($_POST['choice3'])&&isset($_POST['choice4'])&&isset($_POST['rightAns']))
{
	@$testpass=$_REQUEST['testpass'];
	$_SESSION['testpass']=$testpass;
	@$testname=$_REQUEST['ontest'];	
	$_SESSION['ontest']=$testname;
	  @ $qtext=$_REQUEST['question'];
	  @ $ans1=$_REQUEST['choice1'];
	    @ $ans2=$_REQUEST['choice2'];
		  @ $ans3=$_REQUEST['choice3'];
		    @ $ans4=$_REQUEST['choice4'];
			  @ $rightanswer=$_REQUEST['rightAns'];
	
	if(strlen($qtext))
	{
		
 	$query="INSERT INTO quiz(test,qtext,answers1,answers2,answers3,answers4,rightanswer,testpass) VALUES('$testname','$qtext','$ans1','$ans2','$ans3','$ans4','$rightanswer','$testpass')";
	
	mysql_query($query);
	}
	
	if(isset($_POST['+'])){
?>
<form  action="kathigitesform.php " method='POST'>
<br><?php  echo $_SESSION['testpass'] ; ?>
<br><?php  echo $_SESSION['ontest'] ; ?>
			<br><br> ΒΑΛΤΕ ΕΔΩ ΤΗΝ ΕΡΩΤΗΣΗ<input type=text name='question'  >
<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 1 ΕΠΙΛΟΓΗ<input type=text name='choice1'>
<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 2 ΕΠΙΛΟΓΗ<input type=text name='choice2'>
<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 3 ΕΠΙΛΟΓΗ<input type=text name='choice3'>	
	<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 4 ΕΠΙΛΟΓΗ<input type=text name='choice4'>
	<br>ΕΠΙΠΛΕΟΝ ΕΠΙΛΟΓΗ<input type=text name='plusch'>

	<input type='submit' name="+" value='+'>
	<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ  ΣΩΣΤΗ ΕΠΙΛΟΓΗ<input type=text name='rightAns'>
	<input type='submit' value='Submit'>
	</form>
	<?php	
	}
?>
<form action='kathigitesform.php' method='POST'>
ΑΝ ΘΕΛΕΤΑΙ ΝΑ ΠΡΟΣΘΕΣΕΤΑΙ ΚΙΑΛΗ ΕΡΩΤΗΣΗ <input type='submit' name='plusque' value='prosthiki erwthshs'>
</form>
	<?php
}
if (isset($_POST['plusque'])){
?>
<form action='kathigitesform.php' method='POST'>
<br><?php  echo $_SESSION['testpass'] ; ?>
	<br><?php  echo $_SESSION['ontest'] ; ?>
	<br><br><br><br><br> ΒΑΛΤΕ ΕΔΩ ΤΗΝ ΕΡΩΤΗΣΗ<input type=text name='question'  >
<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 1 ΕΠΙΛΟΓΗ<input type=text name='choice1'>
<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 2 ΕΠΙΛΟΓΗ<input type=text name='choice2'>
<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 3 ΕΠΙΛΟΓΗ<input type=text name='choice3'>	
	<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 4 ΕΠΙΛΟΓΗ<input type=text name='choice4'>
	<input type='submit' name='+' value='+'>
	<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ  ΣΩΣΤΗ ΕΠΙΛΟΓΗ<input type=text name='rightAns'>
	<input type='submit' value='Submit'>
	<input type='submit' value='telos eisagvghs ervthsevn' name='endtest'>
	</form>
	<?php	
	
	}
	
	if(isset($_POST['endtest'])){
		?>
<?php  echo $_SESSION['testpass'] ; ?>
	<?php  echo $_SESSION['ontest'] ; ?>
	<?php
	$query="SELECT id,qtext,answers1,answers2,answers3,answers4,rightanswer,test FROM quiz ORDER BY id";
$query_run = mysql_query($query);
$array = array();
if($row=mysql_fetch_array($query_run)){
	while($row=mysql_fetch_array($query_run))
	{
		  $array[] = $row;
	?>
	<br><?php  echo $row['qtext'] ; ?>
	<br><?php  echo $row['answers1'] ; ?>
	<br><?php  echo $row['answers2'] ; ?>
	<br><?php  echo $row['answers3'] ; ?>
	<br><?php  echo $row['answers4'] ; ?>
	<br><?php  echo $row['rightanswer'] ; ?>
	<?php
	}
	
	}
}
	
	?>
	
	
	<?php
	
	if (isset($_POST['test']))
	{
		$query="SELECT DISTINCT arxeiomathimatos.id,arxeiomathimatos.name,arxeiomathimatos.mathima,arxeiomathimatos.test,
		quiz.test,quiz.qtext,quiz.answers1,quiz.answers2,quiz.answers3,quiz.answers4,quiz.righanswer,quiz.testpass
		FROM arxeiomathimatos FULL JOIN quiz ON arxeiomathimatos.test=quiz.test";
			$query_run = mysql_query($query);
while($row=mysql_fetch_array($query_run))
{
 echo $row['qtext'];
}
///ενωση πινακα		
	}
?>



 if(isset($_REQUEST['que'])&&isset($_REQUEST['cho1'])&&isset($_REQUEST['cho2'])&&isset($_REQUEST['cho3'])&&isset($_REQUEST['cho4'])&&isset($_REQUEST['rightAnsw'])&&isset($_REQUEST['testpass'])&&isset($_REQUEST['ontest']))
{

	@$testpass=$_REQUEST['testpass'];
	$_SESSION['testpass']=$testpass;
	@$testname=$_REQUEST['ontest'];	
	$_SESSION['ontest']=$testname;
	  @ $qtext=$_REQUEST['que'];
	  @ $ans1=$_REQUEST['cho1'];
	    @ $ans2=$_REQUEST['cho2'];
		  @ $ans3=$_REQUEST['cho3'];
		    @ $ans4=$_REQUEST['cho4'];
			  @ $rightanswer=$_REQUEST['rightAns'];
	
	if(strlen($qtext))
	{
		
 	$query="INSERT INTO quiz(test,qtext,answers1,answers2,answers3,answers4,rightanswer,testpass) VALUES('$testname','$qtext','$ans1','$ans2','$ans3','$ans4','$rightanswer','$testpass')";
	
	mysql_query($query);
}
while(isset($_POST['submit'])){
?>
 	<form action='kathigitesform.php' method='POST'>
	 
ΑΝ ΘΕΛΕΤΑΙ ΝΑ ΠΡΟΣΘΕΣΕΤΑΙ ΚΙΑΛΗ ΕΡΩΤΗΣΗ <input type='submit' name='plusque' value='prosthiki erwthshs'>
	
</form>