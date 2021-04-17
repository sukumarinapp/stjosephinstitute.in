<?php
session_start();
$page = "Dashboard";
$page1 = "Dashboard1";
include "timeout.php";
include "config.php";
$id=$_GET['id'];
$sub_id=$_GET['sub_id'];
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
 else{
    $sql = "delete from jiier_library where id=$id";
    mysqli_query($conn, $sql);
    header("location: edit-subject.php?id=".$sub_id);
}
