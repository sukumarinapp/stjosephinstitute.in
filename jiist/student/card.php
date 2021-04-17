<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id=isset($_GET['id'])?$_GET['id']:$user_id;
if(file_exists("id/".$id."_front.png")){
	unlink("id/".$id."_front.png");	
}
$cmd1 = "wkhtmltoimage --width 250 http://stjosephinstitute.in/jiist/student/card_front.php?id=".$id." id/".$id."_front.png 2>&1";
$output = shell_exec($cmd1);
if(file_exists("id/".$id."_back.png")){
	unlink("id/".$id."_back.png");
}
$cmd2 = "wkhtmltoimage --width 250 http://stjosephinstitute.in/jiist/student/card_back.php?id=".$id." id/".$id."_back.png 2>&1";
$output = shell_exec($cmd2);

$front = $id."_front.png";
$back = $id."_back.png";

?>
<!DOCTYPE html>
<html>
<body style="background-color: white">
	<table>
	
	<td>
	<img src="id/<?php echo $id; ?>_front.png" />
	</td>
	</tr>
	<tr>
	<td>
	<a href="dl.php?f=id/<?php echo $front; ?>" class="btn btn-success">Download</a>
	</td>
	</tr>
	<tr>
	<td>
	<img src="id/<?php echo $id; ?>_back.png" />
	</td>
	</tr>
	<tr>
	<td>
	<a href="dl.php?f=id/<?php echo $back; ?>" class="btn btn-success">Download</a>
	</td>
	</tr>
	</table>
</body>
</html>	
