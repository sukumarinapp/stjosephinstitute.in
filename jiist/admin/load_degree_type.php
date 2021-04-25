<?php
session_start();
include "config.php";
$degree_id = $_REQUEST['degree_id'];
$response = array();
$sql="select * from jiier_degree_type where degree_id=$degree_id";
$result = mysqli_query($conn, $sql);
$i = 0;
while($row = mysqli_fetch_array($result)){
  $response[$i]['id'] = $row['id'];
  $response[$i]['course_name'] = $row['course_name'];
  $i++;
}
echo json_encode($response);