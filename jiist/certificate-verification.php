<?php
$page = "Verification";
session_start();
include "admin/config.php";
$error = "";
$register_number = "";
$dateof_birth = "";
if (isset($_POST['submit'])) {
    $register_number = $_POST['register_number'];
    $dateof_birth = $_POST['dateof_birth'];

    $sql = "SELECT * FROM jiier_student WHERE register_number='$register_number' and dateof_birth='$dateof_birth'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if ($count >= 1) {
        $_SESSION['timestamp'] = time();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['course_id'] = $row['course_id'];
        $_SESSION['full_name'] = $row['full_name'];
        $_SESSION['photo'] = $row['photo'];
        if($row['status']<>"Inactive" )
            header("location: student/index.php");
            //header("location: student.php");
    } else {
        $error = "Your User Name or Password is invalid";
    }
}    
		
      
                            
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Certificate Verification JIIST</title>
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
        <h1><b>Certificate Verification</b></h1>
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
                                            <div class="/example-box">
                                                <p>
                                                    <h4><b><img alt="" src="assets/images/icons/contact.gif"> Contact
                                                            Address</h4>
			    (St.Joseph Institution Campus) , <br/>
                No 25-196d, St.Joseph Street, <br/>
                Karankadu Po, Kanyakumari Dist, <br/>
                Tamilnadu, India-629809, <p/>

                                                </p>
                                            </div>

                                        </li>
                                        <li class="span4">
										<form action="" method="post">

                                                <table width="475px">
                                                    <tr>
                                                       
                                                        <td valign="top">
                                                        <label for="register_number">
                                                                <h5>Register Number *
                                                                    <h5 />
                                                            </label>
                                                            <input type="text" name="register_number" required maxlength="100"
                                                                size="30">
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                    <td valign="top">

                                                            <input type="submit" name="submit" value="Submit">

                                                        </td>
                                                    </tr>
                                                    
                                                </table>
                                            </form>
                                        </li>
                                        <li class="span4">
                                            <div class="/example-box">
                                                <p>
                                                  
                                            <h4><img alt="" src="assets/images/icons/email.gif"> All Emails</h4>

                                            <ul class="nav">

                                                <li><a href="stjosephinstitute01@gmail.com"> stjosephinstitute01@gmail.com</a></li>
                                                <li><a href="stjosepheducation1@gmail.com"> stjosepheducation1@gmail.com</a></li>
                                            </ul>
                                            <h4><img alt="" src="assets/images/icons/phone.gif"> Phone Contact </h4>
                                            <ul class="nav">

                                                <li><a href="9994207721"> 9994207721</a></li>
                                                <li><a href="9884357721"> 9884357721</a></li>


                                            </ul>
                                            </p>
                                        </li>

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