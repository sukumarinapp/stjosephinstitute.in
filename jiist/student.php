<?php
session_start();
$page = "Verification";
include "admin/timeout.php";
include "admin/config.php";
$user_id=$_SESSION['user_id'];                           
$full_name=$_SESSION['full_name'];                           
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login St.Joseph Institute Of Integrated Science And Technology  </title>
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
    <link rel="icon" href="assets/images/sjei-logo.jpg" />

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
        <h1><b>Welcome to <?php echo $full_name; ?></b></h1>
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
                                                    <h4><b><img alt="" src="assets/images/icons/contact.gif"> ID Card</h4>
<a href="card.php?id=<?php echo $user_id; ?>"><button>Search</button></a>


                                                </p>
                                            </div>

                                        </li>
                                        <li class="span4">
                                        <h4><b>Studens Details</b></h4> 
										<?php
                          $sql = "select * from jiier_student where id=$user_id";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
							$course_id = $row['course_id'];
                            ?>
Full Name = <?php echo $row['full_name']; ?><br>
Register Number = <?php echo $row['register_number']; ?><br>
Date of Birth = <?php echo $row['dateof_birth']; ?><br>
						
                                        </li>
                                        <li class="span4">
                                            <div class="/example-box">
                                                <p>
                                                  
                                            <h4><img alt="" src="assets/images/icons/contact.gif">  Result Grade</h4>
Enrolment Year = <?php echo $row['enrolment_year']; ?><br>
Result = <?php echo $row['status']; ?><br>
Grade = <?php echo $row['grade']; ?><br>
						<?php } ?>
						<?php
						$sql2 = "select * from jiier_paper where id=$course_id";
                        $result2 = mysqli_query($conn, $sql2);
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
Course = <?php echo $row2['paper_name']; ?><br>
<?php } ?>

                                            <ul class="nav">

                                                


                                            </ul>
                                            </p>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
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