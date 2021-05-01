<?php
session_start();
$$page = "Subject";
$page1 = "View Subject";
include "timeout.php";
include "config.php";
$id=$_GET['id'];
$subid=$_GET['subid'];
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
 else{
    $sql = "delete from jiier_questions where id=$id";
    mysqli_query($conn, $sql);
    header("location: questions.php?id=".$subid);
}
