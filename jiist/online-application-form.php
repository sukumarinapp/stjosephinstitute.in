<?php
$page = "Find And Apply";
include "admin/config.php";
$paper_id = $_GET['id'];
error_reporting(1);
set_time_limit(0);
include "mailer/PHPMailerAutoload.php";
	
$centre_id = "1";
$full_name = "";
$father_name = "";
$mother_name = "";
$nationality = "";
$religion = "";
$medium = "";
$blood_group = "";
$gender = "";
$dateof_birth = "";
$employed_unemployed = "";
$physically_handicapped = "";
$phone_number = "";
$email = "";
$course_id = "";
$enrolment_year = "";
$address = "";
$status = 'Inactive';
$lastup_date=date('y/m/d');
$photo = "";
	
	
if(isset($_POST['submit'])){
	//echo "<pre>";
	//print_r($_FILES);
	//print_r($_POST);
	//echo "</pre>";
	//die;
	
    $tag = "";
    $tag .= 'Name : ' . $_POST['full_name'] . '<br>';
    $tag .= 'Father Name : ' . $_POST['father_name'] . '<br>';
    $tag .= 'Mother Name : ' . $_POST['mother_name'] . '<br>';
    $tag .= 'Nationality : ' . $_POST['nationality'] . '<br>';
    $tag .= 'Religion : ' . $_POST['religion'] . '<br>';
    $tag .= 'Medium : ' . $_POST['medium'] . '<br>';
    $tag .= 'Blood Group : ' . $_POST['blood_group'] . '<br>';
    $tag .= 'Gender : ' . $_POST['gender'] . '<br>';
    $tag .= 'Date of Birth : ' . $_POST['dateof_birth'] . '<br>';
    $tag .= 'Employed Unemployed : ' . $_POST['employed_unemployed'] . '<br>';
    $tag .= 'Physically Handicapped : ' . $_POST['physically_handicapped'] . '<br>';
    $tag .= 'Phone Number : ' . $_POST['phone_number'] . '<br>';
    $tag .= 'Course ID : ' . $_POST['course_id'] . '<br>';
    $tag .= 'Enrolment Year : ' . $_POST['enrolment_year'] . '<br>';
    $tag .= 'Address : ' . $_POST['address'] . '<br>';
	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->Username = "webenquriesform@gmail.com";
	$mail->Password = "zqpdqoqtibxuhwmm";
	$mail->SetFrom("webenquriesform@gmail.com");
	$mail->Subject = "JIIST Student Online Apply";
	$mail->MsgHTML($tag);
	
	if(isset($_FILES["resume"])){
        for ($i = 0; $i < count($_FILES["resume"]['name']); $i++) {
            $mail->AddAttachment($_FILES['resume']['tmp_name'][$i],$_FILES['resume']['name'][$i]);
        }        
    }

	$mail->AddAddress("stjosephinstitute01@gmail.com");
	if (!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message has been sent";
	}
$full_name = trim($_POST['full_name']);
$father_name = trim($_POST['father_name']);
$mother_name = trim($_POST['mother_name']);
$nationality = trim($_POST['nationality']);
$religion = trim($_POST['religion']);
$medium = trim($_POST['medium']);
$blood_group = trim($_POST['blood_group']);
$gender = trim($_POST['gender']);
$dateof_birth = trim($_POST['dateof_birth']);
$employed_unemployed = trim($_POST['employed_unemployed']);
$physically_handicapped = trim($_POST['physically_handicapped']);
$phone_number = trim($_POST['phone_number']);
$email = trim($_POST['email']);
$course_id = trim($_POST['course_id']);
$enrolment_year =    trim($_POST['enrolment_year']);
$address = trim($_POST['address']);

    $sql = "SELECT * FROM jiier_student WHERE trim(phone_number)='$phone_number'";
    $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
        $msg = "You have already Appled in your Phone Number";
        $msg_color = "red";
    } else {
        $msg_color = "green";
        if ($_SESSION['user_type'] == "Superadmin") {
            $msg = "Student added Successfully";
        } else {
            $msg = "Student added Successfully";
        }
		
        $stmt = $conn->prepare("INSERT INTO jiier_student (centre_id,full_name,father_name,mother_name,nationality,religion,medium,blood_group,gender,dateof_birth,employed_unemployed,physically_handicapped,phone_number,email,course_id,enrolment_year,address,status,lastup_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("sssssssssssssssssss", $centre_id,$full_name,$father_name,$mother_name,$nationality,$religion,$medium,$blood_group,$gender,$dateof_birth,$employed_unemployed,$physically_handicapped,$phone_number,$email,$course_id,$enrolment_year,$address,$status,$lastup_date);
        $stmt->execute() or die ($stmt->error);
		
	        header("location: index.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Online Application Form St.Joseph Institute Of Integrated Science And Technology  </title>
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
        <h1><b>Online Application Form</b></h1>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span12">
                        <div id="myCarousel" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <ul class="thumbnails">
                                   <li class="span4">
										<form action="" method="post" enctype="multipart/form-data">
                                                <table width="475px">
                                                    <tr>
                                                       <td valign="top">
														 <label for="full_name">
                                                                <h5>Full Name : *<h5 />
                                                            </label>
                                                            <input type="text" name="full_name" required maxlength="100" size="30" style="width:300px;">
                                                      
													 <label for="father_name">
                                                            <h5>Father Name : <h5 />
                                                        </label>
                                                        <input type="text" name="father_name" maxlength="100" size="30" style="width:300px;">
                                                    
														 <label for="mother_name">
                                                                <h5>Mother Name : <h5 />
                                                            </label>
                                                            <input type="text" name="mother_name"  maxlength="200" size="30" style="width:300px;">
                                                       
													 <label for="nationality">
                                                            <h5>Nationality : *<h5 />
                                                        </label>
                                                        <input type="text" name="nationality" required maxlength="100"  size="30" style="width:300px;">
                                                   
														      <label for="religion">
                                                                <h5>Religion : <h5 />
                                                            </label>
                                                            <input type="text" name="religion"  maxlength="100" size="30" style="width:300px;">
                                                       
													<label for="medium">
                                                            <h5>Medium : <h5 />
                                                        </label>
                                                        <input type="text" name="medium"  maxlength="100" size="30" style="width:300px;">
                                                  
														 <label for="blood_group">
                                                                <h5>Blood Group : <h5 />
                                                            </label>
                                                             <select class="form-control"  name="blood_group" id="blood_group"  style="width:310px;">
		<option>Select</option>
    <option value="A +">A +</option>
    <option value="A -">A -</option>
    <option value="B +">B +</option>
	<option value="A -">A -</option>
    <option value="AB +">AB +</option>
    <option value="AB -">AB -</option>
	<option value="O +">O +</option>
    <option value="O -">O -</option>
     </select> 

                                                        <label for="gender">
                                                            <h5>Gender : <h5 />
                                                        </label> 
														<select class="form-control" name="gender" id="gender" style="width:310px;">
	<option>Select</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Others">Others</option>
     </select> 
	 
														
                                                        </td>
                                                    </tr>
                                                   
                                                    
                                                </table>
                                        </li>
                                        <li class="span4">

                                                <table width="475px">
                                                    <tr>
                                                       
                                                       <td valign="top">
													   <label for="dateof_birth">
                                                                <h5>Date Of Birth : *<h5 />
                                                            </label>
                                                            <input type="date" name="dateof_birth" id="dateof_birth" required maxlength="100" size="30"  placeholder="MM/DD/YYYY"   style="width:300px;">
													
													   <label for="employed_unemployed">
                                                            <h5>Employed/Un-Employed : <h5 />
                                                        </label>
                                                         <select class="form-control"  name="employed_unemployed" id="employed_unemployed"  style="width:310px;">
														     <option value="">Select</option>
														     <option value="Yes">Yes</option>
														     <option value="No">No</option>
                                                        </select> 
                                               
														 <label for="physically_handicapped">
                                                                <h5>Physically Handicapped : <h5 />
                                                            </label>
                                                             <select class="form-control"  name="physically_handicapped" id="physically_handicapped"  style="width:310px;" >
		                                                       <option>Select</option>
															   <option value="Yes">Yes</option>
														       <option value="No">No</option>
                                                                    </select> 
													 <label for="phone_number">
                                                            <h5>Phone Number :<h5 />
                                                        </label>
                                                        <input type="tel" name="phone_number"  maxlength="100"  size="30" style="width:300px;">
														<label for="phone_number">
                                                            <h5>Email ID :<h5 />
                                                        </label>
                                                        <input type="email" name="email"  maxlength="100"  size="30" style="width:300px;">
                                                  
														   <label for="course">
														    <?php
$sql = "select a.*,b.program_name, c.degree_name,d.degree_type_name from jiier_paper a,jiier_program b,jiier_degree c, jiier_degree_type d where a.program_id=b.id and a.degree_id=c.id and a.degree_type_id=d.id and a.id=$paper_id";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
																								<text title="
Program = <?php echo $row['program_name']; ?>, 
Degree = <?php echo $row['degree_name']; ?>, 
Degree Type = <?php echo $row['degree_type_name']; ?>, 
Paper = <?php echo $row['paper_name']; ?>"><h5>View Course Details<h5 /></text>

                                                            </label>
											   																 <?php } ?>
												 <input value="<?php echo $paper_id; ?>"type="tel" name="course_id" size="30" style="width:300px;">
													   <label for="enrolment_year">
                                                            <h5>Enrolment Year : 
                                                                <h5 />
                                                        </label>
                                                       <input type="tel" name="enrolment_year"  maxlength="200" size="30" style="width:300px;">
                                                 
													 <label for="address">
                                                            <h5>Address : 
                                                                <h5 />
                                                        </label>
                                                        <textarea rows="4" cols="50" type="text" name="address"  size="30"  style="width:300px;"></textarea>
                                                   
                                                      <label for="files_upload">
                                                            <h5>Files upload :<h5 />
                                                        </label>
														<input type="file" name="resume[]" multiple="multiple" size="30" style="width:300px;">
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