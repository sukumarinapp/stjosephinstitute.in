<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../admin/config.php";

$id=isset($_GET['id'])?$_GET['id']:$user_id;
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
$degree_type_name = $row6['course_name'];

ob_start();
?>
<!DOCTYPE html>
<head>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<style>
         body {
			background-color: #d7d6d3;
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
			font-size: 8px;
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
        @media print {
            body * {
                visibility: hidden;
            }
            #section-to-print, #section-to-print * {
                visibility: visible;
            }
            #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
            }
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
	</style>	

 </head>
<body style="background-color: white">
<table class="table" width="25%" id="section-to-print" align="left" >
        <tbody>
    	<tr>
    		<td>

   <div class="id-card-holder" id="html-content-holder2">
		<div class="id-card">
		<p>This is a computer generated ID</p>
<p>and does not require a signature</p>
<hr>
			<h3><strong>Date of Birth </strong><br> <?php echo $dateof_birth; ?></h3>
			<h3><strong>Phone Number </strong><br> <?php echo $phone_number; ?></h3>
			<h3><strong>Blood Group </strong><br> <?php echo $blood_group; ?></h3>
<hr>
			<h3><strong>Address </strong><br> <?php echo nl2br($address); ?></h3>

<hr>
			<p>Kanyakumari Dist,
Tamilnadu, India-629809</p>
<p>jiiercouncil@gmail.com
 , 9884020301</p>

		</div>
	</div>
</td>
</tr>
    </tbody>
</table>
</body>
</html>