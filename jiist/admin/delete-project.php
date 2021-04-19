<?php
session_start();
$page = "Dashboard";
$page1 = "Dashboard1";
include "timeout.php";
include "config.php";
$id=$_GET['id'];
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
 else{
 	
 	$sql2 = "select * from jiier_project where id=$id";
	$result2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	$project = $row2['project'];
	unlink("project/$jiier_project");

    $sql = "delete from jiier_project where id=$id";
    mysqli_query($conn, $sql);
    header("location: project.php");
}
