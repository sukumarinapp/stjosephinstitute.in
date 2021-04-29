<?php
session_start();
$page = "Hall Ticket";
$page1 = "Dashboard1";
include "timeout.php";
include "config.php";
$id=$_GET['id'];
$student_id=$_GET['student_id'];
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
 else{
    $sql = "delete from jiier_ticket where id=$id";
    mysqli_query($conn, $sql);
    header("location: ticket.php?id=".$student_id);
}
