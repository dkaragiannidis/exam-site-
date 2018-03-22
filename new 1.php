<?php

 $qno=1;

 require_once('connect.inc.php');

  if(isset($_POST['next'])){
  $qno+=1;
  }

  $q="select * from 'quiz' where `qno`='$qno' ";

 $result=mysql_query($q);

 if ($result) {

while($row=mysqli_fetch_array($result)){ 
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

<form name="new 1" method="post" action="new 1.php">
 <!--My Current page name is "exam.php" -->

<?php echo $question ?>  <br>

<input type="radio" name="question1" value="op1"> <?php echo $op1; ?> <br>
<input type="radio" name="question1" value="op2"> <?php echo $op2; ?> <br>
<input type="radio" name="question1" value="op1"> <?php echo $op3; ?> <br>
<input type="radio" name="question1" value="op1"> <?php echo $op4; ?> <br>
<input type="submit" name="previous" value="Previous">
<input type="submit" name="next" value="Next">

</form>