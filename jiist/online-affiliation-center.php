<?php
$page = "Find And Apply";
include "admin/config.php";
error_reporting(1);
set_time_limit(0);
include "mailer/PHPMailerAutoload.php";

$centre_id = "0";
$user_type = "Admin";
$status = "Inactive";
$msg="";

if(isset($_POST['submit'])){
	$tag = "";
	$tag .= 'Name of the organization : ' . $_POST['name_of_the_organization'] . '<br>';
	$tag .= 'Type of organization : ' . $_POST['type_of_organization'] . '<br>';
	$tag .= 'Registered address : ' . $_POST['address'] . '<br>';
	$tag .= 'Year of establishment : ' . $_POST['year_of_establishment'] . '<br>';
	$tag .= 'Year of experience : ' . $_POST['year_of_experience'] . '<br>';
	$tag .= 'Center total area : ' . $_POST['center_total_area'] . '<br>';
	$tag .= 'No of class rooms : ' . $_POST['no_of_class_rooms'] . '<br>';
	$tag .= 'No of laboratories : ' . $_POST['No_of_laboratories'] . '<br>';
	$tag .= 'No of staff available : ' . $_POST['no_of_staff_available'] . '<br>';
	$tag .= 'Remark if any : ' . $_POST['remark_if_any'] . '<br>';
	$tag .= 'Pan no of organization : : ' . $_POST['pan_no_of_organization'] . '<br>';
	$tag .= 'Mobile number: ' . $_POST['mobile_number'] . '<br>';
	$tag .= 'Email id: : ' . $_POST['email'] . '<br>';
	$tag .= 'Website : ' . $_POST['website'] . '<br>';
	$tag .= 'Institute profile/ promoter profile  : ' . $_POST['institute_profile_promoter_profile'] . '<br>';
	$tag .= 'Status  : ' . $_POST['status'] . '<br>';
	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Mailer = "smtp";
	$mail->SMTPDebug  = 0;  
	$mail->SMTPAuth   = TRUE;
	$mail->SMTPSecure = "ssl";
	$mail->Port       = 465;
	$mail->Host       = "smtp.gmail.com";
	$mail->Username   = "universekannan@gmail.com";
	$mail->Password   = "Galaxy)098$1";

	$mail->SetFrom("universekannan@gmail.com");
	$mail->Subject = "Online Affiliation Request";
	$mail->MsgHTML($tag);
	
		
	for ($i = 0; $i < count($_FILES["resume"]['name']); $i++) {
		$mail->AddAttachment($_FILES['resume']['tmp_name'][$i],$_FILES['resume']['name'][$i]);
	}

	$mail->AddAddress("stjosephinstitute01@gmail.com");
	if (!$mail->Send()) {
		//echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		$msg = "Message has been sent";
	}

$full_name = trim($_POST['name_of_the_organization']);
$type_of_organization = trim($_POST['type_of_organization']);
$address = trim($_POST['address']);
$year_of_establishment = trim($_POST['year_of_establishment']);
$year_of_experience = trim($_POST['year_of_experience']);
$center_total_area = trim($_POST['center_total_area']);
$no_of_class_rooms = trim($_POST['no_of_class_rooms']);
$No_of_laboratories = trim($_POST['No_of_laboratories']);
$no_of_staff_available = trim($_POST['no_of_staff_available']);
$remark_if_any = trim($_POST['remark_if_any']);
$pan_no_of_organization = trim($_POST['pan_no_of_organization']);
$mobile_number = trim($_POST['mobile_number']);
$email = trim($_POST['email']);
$website = trim($_POST['website']);
$institute_profile_promoter_profile = trim($_POST['institute_profile_promoter_profile']);

$stmt = $conn->prepare("INSERT INTO jiier_users (full_name,name_of_the_organization,type_of_organization,address,year_of_establishment,year_of_experience,center_total_area,no_of_class_rooms,no_of_laboratories,no_of_staff_available,remark_if_any,pan_no_of_organization,mobile_number,email,website,institute_profile_promoter_profile,status,user_type) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssssssssssssss", $full_name,$full_name,$type_of_organization,$address,$year_of_establishment,$year_of_experience,$center_total_area,$no_of_class_rooms,$No_of_laboratories,$no_of_staff_available,$remark_if_any,$pan_no_of_organization,$mobile_number,$email,$website,$institute_profile_promoter_profile,$status,$user_type);
$stmt->execute() or die ($stmt->error);
$id=$stmt->insert_id;
$sql="update jiier_users set centre_id=$id where id=$id";
mysqli_query($conn,$sql) or die(mysqli_error($conn));
$msg="Request for affiliation has beed sent";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Online Affiliation Form JIIST</title>
	<meta name="description" content="St.Joseph Institute Of Integrated Science And Technology " />
	<meta name="Keywords" content="St.Joseph Institute Of Integrated Science And Technology " />
	<meta property="og:title" content="St.Joseph Institute Of Integrated Science And Technology " />
	<meta property="og:type" content="blog" />
	<meta property="og:type" content="article" />
	<meta property="og:description" content="St.Joseph Institute Of Integrated Science And Technology " />
	<meta property="og:url" content="http://stjosephinstitute.in" />
	<meta property="og:site_name" content="St.Joseph Institute Of Integrated Science And Technology " />
	<meta name="twitter:card" content="summary" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content='IE=8' http-equiv='X-UA-Compatible' />
	<link rel="icon" href="./assets/images/sjei-logo.jpg" />

	<!-- bootstrap -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="assets/css/bootstrappage.css" rel="stylesheet" />

	<!-- global styles -->
	<link href="assets/css/flexslider.css" rel="stylesheet" />
	<link href="assets/css/main.css" rel="stylesheet" />

	<!-- scripts -->
	<script src="assets/js/jquery-1.7.2.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/superfish.js"></script>
	<script src="assets/js/jquery.scrolltotop.js"></script>
	<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<?php include("header.php"); ?>
	<?php include("menu.php"); ?>

	<section class="header_text">
		<h1><b>Online Affiliation Form</b></h1>
	</section>
	<section class="main-content">
		<div class="row">
			<div class="span12">
				<div class="row">
					<div class="span12">
						<h1><?php echo $ms ?></h1>
						<div id="myCarousel" class="myCarousel carousel slide">
							<div class="carousel-inner">
								<div class="active item">
									<ul class="thumbnails">
								   <li class="span4">
										<form action="" method="post">
												<table width="475px">
													<tr>
													   <td valign="top">
														 <label for="name_of_the_organization">
																<h5>Name of the organization: *<h5 />
															</label>
															<input type="text" name="name_of_the_organization" required maxlength="100" size="30" style="width:300px;">
													   <label for="type_of_organization">
															<h5>Type of organization : <h5 />
														</label> 
														<select class="form-control" name="type_of_organization" id="type_of_organization" style="width:310px;">
	<option>Select</option>
	<option value="Proprietorship">Proprietorship</option>
	<option value="Partinership">Partinership</option>
	 </select> 

														  <label for="year_of_establishment">
															<h5>Year of establishment : *<h5 />
														</label>
														<input type="text" name="year_of_establishment" required maxlength="10"  size="30" style="width:300px;">
												   
															
													   
													<label for="year_of_experience">
															<h5>Year of experience : <h5 />
														</label>
														<input type="text" name="year_of_experience"  maxlength="100" size="30" style="width:300px;">
												  
														 <label for="center_total_area">
																<h5>Center total area: <h5 />
															</label>
															 <input type="text" name="center_total_area"  maxlength="100" size="30" style="width:300px;">

														<label for="no_of_class_rooms">
															<h5>No of class rooms : <h5 />
														</label> 
														<input type="text" name="no_of_class_rooms"  maxlength="100" size="30" style="width:300px;">
	  <label for=no_of_laboratories">
																<h5>No of laboratories : *</h5>
															</label>
															<input type="text" name="no_of_laboratories" id="no_of_laboratories"  maxlength="100" size="30"  placeholder=""   style="width:300px;">
														<label for="no_of_staff_available">
															<h5>No of staff available : <h5 />
														</label>
														 <input type="text" name="no_of_staff_available"  maxlength="100" size="30" style="width:300px;">
														</td>
													</tr>
												   
													
												</table>
										</li>
										<li class="span4">

												<table width="475px">
													<tr>
													   
													   <td valign="top">
													  
													
													   
											   
														 <label for="remark_if_any">
																<h5>Remark if any : <h5 />
															</label>
															<input type="text" name="year_of_experience"  maxlength="100" size="30" style="width:300px;">
													 <label for="pan_no_of_organization">
															<h5>Pan no of organization :<h5 />
														</label>
														<input type="tel" name="pan_no_of_organization"  maxlength="100"  size="30" style="width:300px;">
														
														
														 <label for="mobile_number">
															<h5>Mobile number:<h5 />
														</label>
														<input type="tel" name="mobile_number"  maxlength="100"  size="30" style="width:300px;">
												  
														 
													   <label for="email">
															<h5>Email: *
																<h5 />
														</label>
													   <input required="required" type="tel" name="email"  maxlength="200" size="30" style="width:300px;">
												 
													 <label for="website">
															<h5>Website : 
																<h5 />
														</label>
														 <input type="tel" name="website"  maxlength="100" size="30" style="width:300px;">
													<label for="institute_profile_promoter_profile">
															<h5>Institute profile/ promoter profile :
																<h5 />
														</label>
													   <input type="tel" name="institute_profile_promoter_profile"  maxlength="200" size="30" style="width:300px;">
													   <label for="registered_address">
																<h5>Registered address : <h5 />
															</label>
															<textarea type="text" name="address"  maxlength="200" size="30" style="width:300px;"></textarea>
													 
													</td>
													</tr>
													<tr>
														<td colspan="2" style="text-align:center">
															<input type="submit" name="submit" value="Submit">
															
														</td>
													</tr>
													</tr>
													
												</table>
											</form>
										</li>
																			   <?php include("right-minu.php"); ?>


									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br />
				<?php include("footer.php"); ?>

				<script src="assets/js/common.js"></script>
				<script src="assets/js/jquery.flexslider-min.js"></script>
				<script type="text/javascript">
				$(function() {
					$(document).ready(function() {
						$('.flexslider').flexslider({
							animation: "fade",
							slideshowSpeed: 4000,
							animationSpeed: 600,
							controlNav: false,
							directionNav: true,
							controlsContainer: ".flex-container" // the container that holds the flexslider
						});
					});
				});
				</script>
</body>

</html>