<?php
session_start();
include "../admin/config.php";
if(isset($_POST['exam_id']) && isset($_POST['student_id']) && isset($_POST['qid']) && isset($_POST['correct_answer']) && isset($_POST['myanswer']) && isset($_POST['iscorrect']))
{
    $exam_id = $_POST['exam_id'];
    $student_id = $_POST['student_id'];
    $qid = $_POST['qid'];
    $correct_answer = $_POST['correct_answer'];
    $myanswer = $_POST['myanswer'];
    $iscorrect = $_POST['iscorrect'];
    if($iscorrect == 'true'){
        $iscorrect = 1;
    }else{
        $iscorrect = 0;
    }

    $sql = "SELECT * FROM jiier_answers WHERE exam_id = '".$exam_id."' AND student_id = '".$student_id."' AND qid = '".$qid."'";
    $result = mysqli_query($conn, $sql) or die(mysqli_query($conn));
    $num = mysqli_num_rows($result);
    if($num == 0)
    {
        $sql1 = "INSERT INTO jiier_answers(exam_id, student_id, qid, original_answer, myanswer, isCorrect) VALUES('".$exam_id."', '".$student_id."', '".$qid."', '".$correct_answer."', '".$myanswer."', '".$iscorrect."')";
        echo $sql1;
        mysqli_query($conn, $sql1) or die(mysqli_query($conn));
    } else {
        $sql1 = "UPDATE jiier_answers SET original_answer = '".$correct_answer."', myanswer = '".$myanswer."', isCorrect = '".$iscorrect."'  WHERE exam_id = '".$exam_id."' AND student_id = '".$student_id."' AND qid = '".$qid."'  ";
        mysqli_query($conn, $sql1) or die(mysqli_query($conn));
    }

}
?>