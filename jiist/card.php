<?php
include "config.php";

$id = $_GET['id'];
$idcard = $id .".pdf" ;

$sql = "update jiier_student set idcard='$idcard' where id=$id";
mysqli_query($conn, $sql) or die(mysqli_error($conn));

$sql = "select * from  jiier_student where id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$full_name = $row['full_name'];
$register_number = $row['register_number'];
$enrolment_year = $row['enrolment_year'];
$address = $row['address'];
$blood_group = $row['blood_group'];
$dateof_birth = $row['dateof_birth'];
$phone_number = $row['phone_number'];
$centre_id = $row['centre_id'];
$course_id = $row['course_id'];
$photo = $row['photo'];

$sql2 = "select * from  jiier_users where id='$centre_id'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$name_of_the_organization = $row2['name_of_the_organization'];

$sql3 = "select * from  jiier_paper where id='$course_id'";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$paper_name = $row3['paper_name'];
$program_id = $row3['program_id'];
$degree_id = $row3['degree_id'];
$degree_type_id = $row3['degree_type_id'];

$sql4 = "select * from  jiier_program where id='$program_id'";
$result4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_assoc($result4);
$program_name = $row4['program_name'];

$sql5 = "select * from  jiier_degree where id='$degree_id'";
$result5 = mysqli_query($conn, $sql5);
$row5 = mysqli_fetch_assoc($result5);
$degree_name = $row5['degree_name'];

$sql6 = "select * from  jiier_degree_type where id='$degree_type_id'";
$result6 = mysqli_query($conn, $sql6);
$row6 = mysqli_fetch_assoc($result6);
$degree_type_name = $row6['degree_type_name'];

ob_start();
?>
<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
<style>
         body {
			background-color: #d7d6d3;
			font-family:'verdana';
		}
		.id-card-holder {
			width: 225px;
		    padding: 4px;
		    border-radius: 5px;
		    position: relative;
		}
		.id-card {
			
			background-color: #fff;
			padding: 10px;
			border-radius: 10px;
			text-align: center;
			box-shadow: 0 0 1.5px 0px #b9b9b9;
		}
		.id-card img {
			margin: 0 auto;
		}
		.header img {
			width: 130px;
    		margin-top: 10px;
		} 
		.photo img {
			width: 80px;
    		margin-top: 10spx;
		}
		h2 {
			font-size: 15px;
			margin: 5px 0;
		}
		h3 {
			font-size: 12px;
			margin: 2.5px 0;
			font-weight: 300;
		}
		h5 {
			font-size: 12px;
			margin: 2.5px 0;
			font-weight: 500;
		    text-align: left;
			margin-left: 15px;
		}
		.qr-code img {
			width: 50px;
		}
		p {
			font-size: 5px;
			margin: 2px;
		}
		.id-card-hook {
			background-color: #000;
		    width: 70px;
		    margin: 0 auto;
		    height: 15px;
		    border-radius: 5px 5px 0 0;
		}
		.id-card-hook:after {
			content: '';
		    background-color: #d7d6d3;
		    width: 47px;
		    height: 6px;
		    display: block;
		    margin: 0px auto;
		    position: relative;
		    top: 6px;
		    border-radius: 4px;
		}
		.id-card-tag-strip {
			width: 45px;
		    height: 40px;
		    background-color: #0950ef;
		    margin: 0 auto;
		    border-radius: 5px;
		    position: relative;
		    top: 9px;
		    z-index: 1;
		    border: 1px solid #0041ad;
		}
		.id-card-tag-strip:after {
			content: '';
		    display: block;
		    width: 100%;
		    height: 1px;
		    background-color: #c1c1c1;
		    position: relative;
		    top: 10px;
		}
		.id-card-tag {
			width: 0;
			height: 0;
			border-left: 100px solid transparent;
			border-right: 100px solid transparent;
			border-top: 100px solid #0958db;
			margin: -10px auto -30px auto;
		}
		.id-card-tag:after {
			content: '';
		    display: block;
		    width: 0;
		    height: 0;
		    border-left: 50px solid transparent;
		    border-right: 50px solid transparent;
		    border-top: 100px solid #d7d6d3;
		    margin: -10px auto -30px auto;
		    position: relative;
		    top: -130px;
		    left: -50px;
		}
		
	</style>	

	
	<html>
<head>
 </head>
<body>
<table border="0" align="left" width="50%">
<tr>
<td>    
<tr>
<td>  
	<tr>
<td align="left">
	<a id="btn-Convert-Html2Image" href="#">Download</a>
</td>	
</tr>
<tr>
<td>
<div style="display: block" id="previewImage"></div>
</td>
</tr>
<table class="table" style="width:30%" align="left" >
    <thead >
    </thead>
    <tbody>
    <div class="id-card-holder">
		<div class="id-card">
			<div class="header">
				<img src="assets/images/id.png">
			</div>
			<div class="photo">
				<img src="admin/uploads/<?php echo $photo; ?>">
			</div>
			<h2><?php echo $full_name; ?></h2>
<hr>
			<h5>Year&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp: <?php echo $enrolment_year; ?></h5>
			<h5>Register No : <?php echo $register_number; ?></h5>
			<h5>Discipline&nbsp;: <?php echo $degree_name; ?></h5>
			<h3>Centre : <?php echo $name_of_the_organization; ?></h3>

			
			<hr>
			<p><strong>Address : </strong> St.Joseph Institution Campus, No 25-196D, St.Joseph Street, <p>
			<p>Karankadu Po, Kanyakumari Dist, Tamilnadu <strong>629809</strong></p>
			<p>Ph: 9994207721 | E-mail: stjosephinstitute01@gmail.com</p>
		</div>
	</div>
    </tbody>
</table>
</td>
<td>
<table class="table" style="width:30%" align="left" >
    <tbody>
   <div class="id-card-holder">
		<div class="id-card">
		<p>This is a computer generated ID</p>
<p>and does not require a signature</p>
<hr>
<br>
			<h3><strong>Course </strong><br> <?php echo $paper_name; ?></h3>
			<h3><strong>Date of Birth </strong><br> <?php echo $dateof_birth; ?></h3>
			<h3><strong>Phone Number </strong><br> <?php echo $phone_number; ?></h3>
			<h3><strong>Blood Group </strong><br> <?php echo $blood_group; ?></h3>
			<br>
<hr>
			<h3><strong>Address </strong><br> <?php echo nl2br($address); ?></h3>

			<hr>
						<h3>www.stjosephinstitute.in</h3>

			<p>IF FOUND, PLEASE RETURN TO THE</p>
<p>INSTITUTE ADDRESS</p>

		</div>
	</div>
    </tbody>
</table>
</td>

</tr>
</table>
 <script>
$(document).ready(function(){
    var element = $("#html-content-holder"); // global variable
    var getCanvas; // global variable
    //$("#btn-Preview-Image").on('click', function () {
         html2canvas(element, {
         onrendered: function (canvas) {
                $("#previewImage").append(canvas);
                getCanvas = canvas;
             }
         });
    //});
    $("#html-content-holder").hide();

	$("#btn-Convert-Html2Image").on('click', function () {
    var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    $("#btn-Convert-Html2Image").attr("download", "<?php echo $id; ?>.png").attr("href", newData);
	});

</script>
</body>
</html>