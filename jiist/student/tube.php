<?php
session_start();
$page = "Virtual Class";
include "../admin/timeout.php";
include "../admin/config.php";
$video_id=$_GET['id'];                           
$full_name=$_SESSION['full_name'];  
$course_id=$_SESSION['course_id'];   
$sql = "select * from jiier_video where id=$video_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);                    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>
    ST.Joseph Institute
  </title>
</head>
<body>
 	<iframe width="699" height="393" src="<?php echo $row['video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</body>
</html>	