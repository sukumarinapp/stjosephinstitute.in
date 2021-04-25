<?php
session_start();
include "config.php";
$program_id = $_REQUEST['program_id'];
$response = array();
$sql="select * from jiier_degree where program_id=$program_id";
$result = mysqli_query($conn, $sql);
$i = 0;
while($row = mysqli_fetch_array($result)){
  $response[$i]['degree_id'] = $row['id'];
  $response[$i]['degree_name'] = $row['degree_name'];
  $i++;
}
echo json_encode($response);