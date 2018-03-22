<form action='kathigitesform.php' method='POST'>
ΑΝ ΘΕΛΕΤΑΙ ΝΑ ΔΗΜΙΟΥΡΓΗΣΕΤΑΙ ΤΕΣΤ ΠΑΤΗΣΤΕ ΕΔΩ <br><input type='submit' name='arxmath' value='ΔΗΜΙΟΥΡΓΙΑ ΑΡΧΕΙΟΥ ΜΑΘΗΜΑΤΟΣ'></br>


</form>

<?php
mysql_query("SET NAMES utf8");
require 'connect.inc.php';
require 'core.inc.php';

if (isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
	echo '    you\'re logged in proffesor   '.$_SESSION['user_name'].'<br> <a href="logout.php">Log out</a>';
	$user_name=$_SESSION['user_name'];
	 $user_id=$_SESSION['user_id'];
	$query="SELECT DISTINCT id,mathima,name,test FROM arxeiomathimatos WHERE id='$user_id' ";
	
	$query_run = mysql_query($query);
while($row=mysql_fetch_array($query_run)){
	$math=$row['mathima'];
	
	$test=$row['test'];
	
	?>
	
<head>
<title></title>

<link rel="stylesheet" href="stylemath.css" type="text/css" />
</head>
<body>


<div id="menu">
  <ul>
    <li><a href="kathigitesform.php" name="math"><?php echo $math;?></a></li>
    </ul>
	
	<ul>
	<li><a href="kathigitesform.php" name="test"><?php echo $test;?></a></li>
</ul>
	</div>
</body>

<?php
	}

}else{
	
include 'loginform.inc.php';
}
if(isset($_POST['arxmath'])){
	?>
<form>

δημιουργεια αρχειου μαθηματος <input type=text name='math'>
δημιουργεια αρχειου μαθηματος <input type=text name='test'>
<input type='submit' value='Submit'>
</form>
	<?php

}


	mysql_query("SET NAMES utf8");	
 
@$math=$_REQUEST['math'];
	$_SESSION['mathima']=$math;
		@$user_name=$_SESSION['user_name'];
 @$test=$_REQUEST['test'];

	if(strlen($math))
	{
 	$query="INSERT INTO arxeiomathimatos (name,mathima,test) VALUES('$user_name','$math','$test')";
	
	mysql_query($query);
}
?>
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
	
	<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ  ΣΩΣΤΗ ΕΠΙΛΟΓΗ<input type=text name='rightAns'>
	<input type='submit' value='Submit' name="submit">
	</form>

	<?php	
	
	}
	
	if(isset($_REQUEST['question'])&&isset($_REQUEST['choice1'])&&isset($_REQUEST['choice2'])&&isset($_REQUEST['choice3'])&&isset($_REQUEST['choice4'])&&isset($_REQUEST['rightAns']))
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
$query="SELECT Qid FROM quiz WHERE testpass='$testpass'";
$query_run = mysql_query($query);
while($row=mysql_fetch_array($query_run))
{
	$id=$row['Qid'];
}
echo $id=$id+1;
	if(strlen($qtext))
	{
		
 	$query="INSERT INTO quiz(test,qtext,answers1,answers2,answers3,answers4,rightanswer,testpass,Qid) VALUES('$testname','$qtext','$ans1','$ans2','$ans3','$ans4','$rightanswer','$testpass','$id')";
	
	mysql_query($query);
}
	?>

<?php
	
}
 if(isset($_POST['plusque'])){

?>
<form action='kathigitesform.php' method='POST'>
<br>test password<input type=text name='testpass' value="<?php  echo $_SESSION['testpass'] ; ?>">
	<br>titlos test<input type=text name='ontest' value="<?php  echo $_SESSION['ontest'] ; ?>">
	
	
	<br><br><br><br> ΒΑΛΤΕ ΕΔΩ ΤΗΝ ΕΡΩΤΗΣΗ<input type=text name='question'  >
<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 1 ΕΠΙΛΟΓΗ<input type=text name='choice1'>
<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 2 ΕΠΙΛΟΓΗ<input type=text name='choice2'>
<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 3 ΕΠΙΛΟΓΗ<input type=text name='choice3'>	
	<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ 4 ΕΠΙΛΟΓΗ<input type=text name='choice4'>
	
	<br>ΕΔΩ ΒΑΛΤΕ ΤΗΝ  ΣΩΣΤΗ ΕΠΙΛΟΓΗ<input type=text name='rightAns'>
	<input type='submit' value='Submit'  name="submit">
	<input type='submit' value='telos eisagvghs ervthsevn' name='endtest'>
	
	</form>
	<?php	
	
	}

if (isset($_POST['submit'])){

	?>
	
 <form action='kathigitesform.php' method='POST'>
	 
ΑΝ ΘΕΛΕΤΑΙ ΝΑ ΠΡΟΣΘΕΣΕΤΑΙ ΚΙΑΛΗ ΕΡΩΤΗΣΗ <input type='submit' name='plusque' value='prosthiki erwthshs'>
	
</form>
<?php

}

if(isset($_POST['endtest'])){
	$query="SELECT DISTINCT id,qtext,answers1,answers2,answers3,answers4,rightanswer,testpass FROM quiz  ORDER BY 'id' ";
	$query_run = mysql_query($query);


	while($row=mysql_fetch_array($query_run))
	{
		  
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

?>

