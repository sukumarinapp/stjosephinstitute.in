<?php
$page = "Careers";
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

    $tag .= 'Name:' . $_POST['name'] . '<br>';
	
	$tag .= 'Position Applying:' . $_POST['position_applying'] . '<br>';
	
	$tag .= 'Notice Period:' . $_POST['notice_period'] . '<br>';
	
	$tag .= 'Mobile:' . $_POST['mobile'] . '<br>';
	
	$tag .= 'Email:' . $_POST['email'] . '<br>';
	
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
	$mail->Subject = "Careers";
	$mail->MsgHTML($tag);
	
	
	for ($i = 0; $i < count($_FILES["resume"]['name']); $i++) {
		$mail->AddAttachment($_FILES['resume']['tmp_name'][$i],$_FILES['resume']['name'][$i]);
	}

	$mail->AddAddress("universekannan@gmail.com");
	if (!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message has been sent";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>RSR Builders</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.transitions.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body id="home" class="homepage">
  <?php include"header.php";?>
   
    <section id="about">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Careers</h2>
            </div>

        <!-- Up to Small media Size -->
        <div class="hidden-xs">
            <div class="row valign-wrapper">
                <div class="col-sm-7">
                            <form class="cmxform form-horizontal" id="postEnquiry" enctype="multipart/form-data" method="post" action="">
								<div class="form-group">
									<label class="control-label col-md-3 prayerReqLbl" for="full_name">Name</label>
									<div class="col-md-9"><input type="text" class="form-control input-sm" name="name" id="name" required="required" placeholder=""></div>
								</div>	
								<div class="form-group">
									<label class="control-label col-md-3 prayerReqLbl" for="sender_email">Position Applying For</label>
									<div class="col-md-9"><input type="text" class="form-control input-sm" name="position_applying" id="position_applying" required="required" placeholder=""></div>
								</div>
								 <div class="form-group">
									<label class="control-label col-md-3 prayerReqLbl" for="full_name">Notice Period:</label>
									<div class="col-md-9"><input type="text" class="form-control input-sm" name="notice_period" id="notice_period" required="required" placeholder=""></div>
								</div>		
                                  <div class="form-group">
									<label class="control-label col-md-3 prayerReqLbl" for="full_name">Mobile</label>
									<div class="col-md-9"><input type="text" class="form-control input-sm" name="mobile" id="mobile" required="required" placeholder=""></div>
								</div>									
								 <div class="form-group">
									<label class="control-label col-md-3 prayerReqLbl" for="full_name">E-Mail</label>
									<div class="col-md-9"><input type="email" class="form-control input-sm" name="email" id="email" required="required" placeholder=""></div>
								</div>			
								
									
									
								</div><div class="form-group">
									<label class="control-label col-md-3 prayerReqLbl" for="fullAddress"> Resume</label>
									<div class="col-md-9"><input type="file" name="resume[]" multiple="multiple" class="form-control" type="file"></div>
								</div>
							
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
									 <input type="submit" name="submit" value="Submit" /></label> 
									</div>
								</div>
							</form>	
				<!-- Display submission status -->

				</div>
                <div class="col-sm-5 prl0"><img class="img-responsive reveal-0"
                 src="images/gn.jpg" alt=""></div>
                
            </div>
        </div>
        <!-- End up to Small media Size -->

        <!-- Mobile Size -->
        <div id="service_mobile_section" class="hidden-sm hidden-md hidden-lg service_mobile_section">
            <div class="col-xs-10 col-xs-offset-1 description">
                <div class="description_img">
                    <img class="img-responsive" src="assets/images/gh.jpg" alt="">
                </div>
                <p>Allure Professional Beauty Institute & Salon for ladies will make an impact on Beauty Industry. If you wish to be a part of our journey, send your resume to careers@rsr.com</p>
            </div>
        </div>
        <!-- End Mobile Size -->

    </div>
</section>
<section id="our_services" class="our_services">
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-0">
                <img class="img-responsive" src="images/portfolio/3.jpg" alt="">
                <h3 class="text-center"><a href="#"></a></h3>
              
            </div>
            <div class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-0">
                <img class="img-responsive " src="images/portfolio/4.jpg" alt="">
                <h3 class="text-center"><a href="#"></a></h3>
               
            </div>
            <div class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-0">
                <img class="img-responsive  " src="images/portfolio/2.jpg" alt="">
                <h3 class="text-center"><a href="#"></a></h3>
               
            </div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-0">
                <img class="img-responsive  " src="images/portfolio/5.jpg" alt="">
                <h3 class="text-center"><a href="#"></a></h3>
               
        </div>
    </div>
</section>



     <?php include"footer.php"?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mousescroll.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>