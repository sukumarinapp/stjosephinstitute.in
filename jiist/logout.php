<?php
session_start();
session_destroy();
unset($_SESSION["user_id"]);
unset($_SESSION["course_id"]);
unset($_SESSION["full_name"]);
unset($_SESSION["photo"]);
header("Location: login.php");
?>