<?php
session_start();
$page = "Onine Exam";
$page1 = "Online Exam";
include "timeout.php";
include "../admin/config.php";
if (($_SESSION['user_type'] != "admin") && ($_SESSION['user_type'] != "Student")) header("location: index.php");
$user_id=$_SESSION['user_id'];
if(isset($_GET['exam_id']) AND isset($_GET['total']) AND isset($_GET['correct']))
{
  $exam_id = $_GET['exam_id'];
  $total = $_GET['total'];
  $correct = $_GET['correct'];
  $incorrect = $_GET['total'] - $_GET['correct'];
  $sql = "INSERT INTO jiier_results (exam_id, student_id, total, correct, incorrect) VALUES('".$exam_id."', '".$user_id."', '".$total."', '".$correct."', '".$incorrect."')";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}
header("location: result.php?id=".$exam_id);