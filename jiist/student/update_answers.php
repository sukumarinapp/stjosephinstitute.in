<?php
//Update Answer
session_start();
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "admin") && ($_SESSION['user_type'] != "Student")) header("location: index.php");
$user_id=$_SESSION['user_id'];
if(isset($_POST['course_id']) && isset($_POST['student_id']) && isset($_POST['qid']) && isset($_POST['correct_answer']) && isset($_POST['myanswer']) && isset($_POST['iscorrect']))
{
    $course_id = $_POST['course_id'];
    $student_id = $_POST['student_id'];
    $qid = $_POST['qid'];
    $correct_answer = $_POST['correct_answer'];
    $myanswer = $_POST['myanswer'];
    $iscorrect = $_POST['iscorrect'];
    if($iscorrect == 'true')
    {
        $iscorrect = 1;
    } else {
        $iscorrect = 0;
    }

    $sql = "SELECT * FROM answers WHERE exam_id = '".$course_id."' AND student_id = '".$student_id."' AND qid = '".$qid."'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 0)
    {
        $sql1 = "INSERT INTO answers(exam_id, student_id, qid, original_answer, myanswer, isCorrect) VALUES('".$course_id."', '".$student_id."', '".$qid."', '".$correct_answer."', '".$myanswer."', '".$iscorrect."')";
        $result1 = mysqli_query($conn, $sql1);
        // Insert
    } else {
        // Update
        $sql1 = "UPDATE answers SET original_answer = '".$correct_answer."', myanswer = '".$myanswer."', isCorrect = '".$iscorrect."'  WHERE exam_id = '".$course_id."' AND student_id = '".$student_id."' AND qid = '".$qid."'  ";
        $result1 = mysqli_query($conn, $sql1);
    }

}
?>