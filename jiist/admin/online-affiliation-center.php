<?php
$page = "Find And Apply";
include "config.php";
//$id = $_GET['id'];
error_reporting(1);
set_time_limit(0);
include "mailer/PHPMailerAutoload.php";
if(isset($_POST['submit'])){
	//echo "<pre>";
	//print_r($_FILES);
	//print_r($_POST);
	//echo "</pre>";
	//die;
	
    $tag = "";
    $tag .= 'Name of the organization : ' . $_POST['name_of_the_organization'] . '<br>';
    $tag .= 'Type of organization : ' . $_POST['type_of_organization'] . '<br>';
    $tag .= 'Registered address : ' . $_POST['registered_address'] . '<br>';
    $tag .= 'Year of establishment : ' . $_POST['year_of_establishment'] . '<br>';
    $tag .= 'Year of experience : ' . $_POST['year_of_experience'] . '<br>';
    $tag .= 'Center total area : ' . $_POST['center_total_area'] . '<br>';
    $tag .= 'No of class rooms : ' . $_POST['no_of_class_rooms'] . '<br>';
    $tag .= 'No of laboratories : ' . $_POST['No_of_laboratories'] . '<br>';
    $tag .= 'No of staff available : ' . $_POST['no_of_staff_available'] . '<br>';
    $tag .= 'Remark if any : ' . $_POST['remark_if_any'] . '<br>';
    $tag .= 'Pan no of organization : : ' . $_POST['pan_no_of_organization'] . '<br>';
    $tag .= 'Mobile number: ' . $_POST['mobile_number'] . '<br>';
    $tag .= 'Email id: : ' . $_POST['email_id'] . '<br>';
    $tag .= 'Website : ' . $_POST['website'] . '<br>';
    $tag .= 'Institute profile/ promoter profile  : ' . $_POST['institute_profile_promoter_profile'] . '<br>';
	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->Username = "sukumar.inapp2@gmail.com";
	$mail->Password = "rails2020";
	$mail->SetFrom("sukumar.inapp2@gmail.com");
	$mail->Subject = "JIIER Student Online Apply";
	$mail->MsgHTML($tag);
	
		
	for ($i = 0; $i < count($_FILES["resume"]['name']); $i++) {
		$mail->AddAttachment($_FILES['resume']['tmp_name'][$i],$_FILES['resume']['name'][$i]);
	}

	$mail->AddAddress("stjosephinstitute01@gmail.com");
	if (!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message has been sent";
	}
	        header("location: find-admission-centers.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Online Affiliation Form St.Joseph Educational Institute  </title>
    <meta name="description" content="St.Joseph Educational Institute " />
    <meta name="Keywords" content="St.Joseph Educational Institute " />
    <meta property="og:title" content="St.Joseph Educational Institute " />
    <meta property="og:type" content="blog" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="St.Joseph Educational Institute " />
    <meta property="og:url" content="http://stjosephinstitute.in" />
    <meta property="og:site_name" content="St.Joseph Educational Institute " />
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
                                                            <input type="text" name="name_of_the_organization" required maxlength="50" size="30" style="width:300px;">
                                                      
													 <label for="type_of_organization">
                                                            <h5>Type of organization : <h5 />
                                                        </label>
                                                        <input type="text" name="type_of_organization" maxlength="80" size="30" style="width:300px;">
 
                                                          <label for="year_of_establishment">
                                                            <h5>Year of establishment : *<h5 />
                                                        </label>
                                                        <input type="text" name="year_of_establishment" required maxlength="80"  size="30" style="width:300px;">
                                                   
														    
                                                       
													<label for="year_of_experience">
                                                            <h5>Year of experience : <h5 />
                                                        </label>
                                                        <input type="text" name="year_of_experience"  maxlength="80" size="30" style="width:300px;">
                                                  
														 <label for="center_total_area">
                                                                <h5>Center total area: <h5 />
                                                            </label>
                                                             <input type="text" name="center_total_area"  maxlength="80" size="30" style="width:300px;">

                                                        <label for="no_of_class_rooms">
                                                            <h5>No of class rooms : <h5 />
                                                        </label> 
														<input type="text" name="no_of_class_rooms"  maxlength="80" size="30" style="width:300px;">
	  <label for="No_of_laboratories">
                                                                <h5>No of laboratories : *</h5>
                                                            </label>
                                                            <input type="text" name="No_of_laboratories" id="No_of_laboratories"  maxlength="50" size="30"  placeholder=""   style="width:300px;">
														<label for="no_of_staff_available">
                                                            <h5>No of staff available : <h5 />
                                                        </label>
                                                         <input type="text" name="no_of_staff_available"  maxlength="80" size="30" style="width:300px;">
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
                                                            <input type="text" name="year_of_experience"  maxlength="80" size="30" style="width:300px;">
													 <label for="pan_no_of_organization">
                                                            <h5>Pan no of organization :<h5 />
                                                        </label>
                                                        <input type="tel" name="pan_no_of_organization"  maxlength="80"  size="30" style="width:300px;">
														
														
														 <label for="mobile_number">
                                                            <h5>Mobile number:<h5 />
                                                        </label>
                                                        <input type="tel" name="mobile_number"  maxlength="80"  size="30" style="width:300px;">
                                                  
														 
													   <label for="email_id">
                                                            <h5>Email id:
                                                                <h5 />
                                                        </label>
                                                       <input type="tel" name="email_id"  maxlength="30" size="30" style="width:300px;">
                                                 
													 <label for="website">
                                                            <h5>Website : 
                                                                <h5 />
                                                        </label>
                                                         <input type="tel" name="website"  maxlength="30" size="30" style="width:300px;">
                                                    <label for="institute_profile_promoter_profile">
                                                            <h5>Institute profile/ promoter profile :
                                                                <h5 />
                                                        </label>
                                                       <input type="tel" name="institute_profile_promoter_profile"  maxlength="30" size="30" style="width:300px;">
													   <label for="registered_address">
                                                                <h5>Registered address : <h5 />
                                                            </label>
                                                            <textarea type="text" name="registered_address"  maxlength="30" size="30" style="width:300px;"></textarea>
                                                     
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