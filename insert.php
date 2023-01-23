<?php
session_start();
$con = mysqli_connect("localhost","root","","web_quiz");
echo "Hello World";
 if(isset($_POST['save_data']))   
    $diff= $_POST['difficulty'];

$query="INSERT INTO quiz_questions (difficulty) VALUES ('$diff')" ;
$query_run=mysqli_query($con,$sql); 
if($query_run)
{
    $_SESSION['status']="Inserted sucesfully";
    header("Location: add-quiz.php");
}
else{

    $_SESSION['status']="Inserted sucesfully";
    header("Location: add-quiz.php");
}

?>