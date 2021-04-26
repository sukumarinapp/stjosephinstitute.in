<?php
$page = "Programs";
include "admin/config.php";
$program_id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
		<title>Program St.Joseph Institute Of Integrated Science And Technology  </title>
        <meta name="description" content="Program St.Joseph Institute Of Integrated Science And Technology " />
		<meta name="Keywords" content="Program St.Joseph Institute Of Integrated Science And Technology " />
        <meta property="og:title" content="Program St.Joseph Institute Of Integrated Science And Technology " />
	    <meta property="og:description" content="Program St.Joseph Institute Of Integrated Science And Technology " />
        <meta property="og:url" content="http://stjosephinstitute.in" />
        <meta property="og:site_name" content="Program St.Joseph Institute Of Integrated Science And Technology " />
	    <meta name="twitter:card" content="summary" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content='IE=8' http-equiv='X-UA-Compatible'/>
		<link rel="icon" href="./assets/images/sjei-logo.jpg" />

    <!-- bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="assets/css/bootstrappage.css" rel="stylesheet"/>
    <!-- global styles -->
    <link href="assets/css/flexslider.css" rel="stylesheet"/>
    <link href="assets/css/main.css" rel="stylesheet"/>
    <!-- scripts -->
    <script src="assets/js/jquery-1.7.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/superfish.js"></script>
    <script src="assets/js/jquery.scrolltotop.js"></script>
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
    <style>
        /* Latest compiled and minified CSS included as External Resource*/
        /* Optional theme */
        @import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css');

        body {
            margin: 10px;
        }

        .panel-group {
            cursor: pointer;
        }
    </style>

</head>
<body>
<?php include("header.php"); ?>
<?php include("menu.php"); ?>
<section class="main-content">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span12">
                    <br/>
                    <div id="myCarousel" class="myCarousel carousel slide">
                        <div class="carousel-inner">
                            <div class="active item">
                               <section class="header_text">
								         <h3><center>
					<?php
					    $sql = "select a.degree_id,b.degree_name,c.degree_details,program_name,photo from jiier_paper a,jiier_degree b,jiier_program c where a.degree_id=b.id and a.program_id=c.id and a.program_id='$program_id' group By a.degree_id";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
						$degree_details = $row['degree_details'];
						$program_name = $row['program_name'];
						$photo = $row['photo'];
						$degree_id = $row['degree_id'];

                        ?>
					<a type="button" class="btn btn-secondary" href="degree.php?degree_id=<?php echo $row['degree_id']; ?>"><?php echo $row['degree_name']; ?></a>
					
								 <?php } ?>	
					</center></h3>

                                    <hr>
                                </section>
                                <ul class="thumbnails">

                                    <li class="span8">
                                        <div class="/example-box">
                                            <!-- Button trigger modal -->
											 <h3><b>About <?php echo $program_name; ?> </h3></b>
 
<p class="price"><img src="assets/images/<?php echo $photo; ?>" alt="Smiley face" height="1200" width="800"/></p> 
                                    
<?php echo $degree_details; ?>                                        </div>
                                    </li>
                                  	 <?php include("right-minu.php"); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<?php include("footer.php"); ?>

<script src="assets/js/common.js"></script>
<script src="assets/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click','.close2', function(){
            $('.close2').each( function(){
                $(this).closest('.modal').modal('hide');
            });
        });
    });
</script>
</body>
</html>