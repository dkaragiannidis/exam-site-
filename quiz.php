<form action="quiz.php" method="POST">
<input type="submit" value="start test" name="start">
</form>
<?php

require 'connect.inc.php';
require 'core.inc.php';


echo $_SESSION['user_name'];
		echo $_SESSION['testpass'];
		$testpass=$_SESSION['testpass'];

		
	$query="SELECT  * FROM quiz WHERE testpass=$testpass ORDER BY 'id' ";
	
	$query_run = mysql_query($query);
	
	$count='0';
	while(@$row=mysql_fetch_array($query_run))
	{
		
		
		$id=$row['id'];
		$qtext=$row['qtext']; 
		$answers1= $row['answers1'];
		$answers2=$row['answers2'];
		 $answers3=$row['answers3'];
		$answers4=$row['answers4'];
		  $rightanswer=$row['rightanswer'];
		  
	$count++;
	
	}
	echo '<br>'.$count;
	if(!isset($_SESSION['qno'])){
  $_SESSION['qno'] = 1;

}
else if(isset($_POST['next'])){
    $_SESSION['qno'] += 1;
	if($_SESSION['qno']>$count)
	{
		$_SESSION['qno']-=1;
		echo '<br><br><br>euxaristoume poli<br>';
	}
  }
  else{
	if(isset($_POST['previous'])){
	 $_SESSION['qno'] -= 1;
if($_SESSION['qno']<1 ){
	$_SESSION['qno']=1; 
}	 
  }}


  $q="SELECT DISTINCT * FROM quiz WHERE Qid='".$_SESSION['qno']."' ";

 $result=mysql_query($q);

 if ($result) {

while($row=mysql_fetch_array($result)){ 
$qno = $row['Qid'];
$question = $row['qtext'];
$op1 = $row['answers1'];
$op2 = $row['answers2'];
$op3 = $row['answers3'];
$op4 = $row['answers4'];
$answer = $row['rightanswer'];

}
 }
if(isset($_REQUEST['question1']))
	{
		if($_REQUEST['question1']==$op1){
			$answer2 = $_REQUEST['question1'];
		if($answer2==$answer){
		
		ECHO 'CORRECT';
		}
		
		else{
			ECHO 'WRONG';
			$cor='WRONG';
		}
	}
	if($_REQUEST['question1']==$op2){
			$answer2 = $_REQUEST['question1'];
		if($answer2==$answer){
		
		ECHO 'CORRECT';
		}
		
		else{
			ECHO 'WRONG';
			#$cor='WRONG';
		}
	}
	if($_REQUEST['question1']==$op3){
			$answer2 = $_REQUEST['question1'];
		if($answer2==$answer){
		
		ECHO 'CORRECT';
		}
		
		else{
			ECHO 'WRONG';
			#$cor='WRONG';
		}
	}
	if($_REQUEST['question1']==$op4){
			$answer2 = $_REQUEST['question1'];
		if($answer2==$answer){
		
		ECHO 'CORRECT';
		}
		
		else{
			ECHO 'WRONG';
			#$cor='WRONG';
		}
	}
	}
	
	
	#$name='marios';
# $query="INSERT INTO examresult(name,Qid,answer,result) VALUES('".$_SESSION['$user_name']."','$qno','$answer','$cor')";
?>

<form name="quiz" method="post" action="quiz.php">
 <!--My Current page name is "exam.php" -->

<?php echo $question ?>  <br>

<input type="radio" name="question1" value="<?php echo $op1; ?>"> <?php echo $op1; ?> <br>
<input type="radio" name="question1" value="<?php echo $op2; ?>"> <?php echo $op2; ?> <br>
<input type="radio" name="question1" value="<?php echo $op3; ?>"> <?php echo $op3; ?> <br>
<input type="radio" name="question1" value="<?php echo $op4; ?>"> <?php echo $op4; ?> <br>
<input type="submit" name="previous" value="Previous">
<input type="submit" name="next" value="Next">

</form>


	
	
