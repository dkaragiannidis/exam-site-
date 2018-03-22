<?php

session_start();
require('connect.inc.php');
 
if(!isset($_SESSION['qno'])){
  $_SESSION['qno'] = 1;

}
else if(isset($_POST['next'])){
    $_SESSION['qno'] += 1;
	
  }
  else{
	if(isset($_POST['previous'])){
	 $_SESSION['qno'] -= 1;
if($_SESSION['qno']<1 ){
	$_SESSION['qno']=1; 
}	 
  }}


  $q="SELECT * FROM quiz WHERE id='".$_SESSION['qno']."' ";

 $result=mysql_query($q);

 if ($result) {

while($row=mysql_fetch_array($result)){ 
$qno = $row['id'];
$question = $row['qtext'];
$op1 = $row['answers1'];
$op2 = $row['answers2'];
$op3 = $row['answers3'];
$op4 = $row['answers4'];
$answer = $row['rightanswer'];

}
 }

?>

<form name="exam" method="post" action="exam.php">
 <!--My Current page name is "exam.php" -->

<?php echo $question ?>  <br>

<input type="radio" name="question1" value="op1"> <?php echo $op1; ?> <br>
<input type="radio" name="question1" value="op2"> <?php echo $op2; ?> <br>
<input type="radio" name="question1" value="op1"> <?php echo $op3; ?> <br>
<input type="radio" name="question1" value="op1"> <?php echo $op4; ?> <br>
<input type="submit" name="previous" value="Previous">
<input type="submit" name="next" value="Next">

</form>