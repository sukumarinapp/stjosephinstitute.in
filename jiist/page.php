<?php
$page = "Programs";
include "admin/config.php";

$found = false;

$paper_name = "";

if (isset($_POST['submit'])) {

    $paper_name = $_POST['paper_name'];

    $sql = "select * from jiier_paper where paper_name='$paper_name'";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($result)) {

        $found = true;

    }

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $row = mysqli_fetch_assoc($result);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
		<title>Pages St.Joseph Institute Of Integrated Science And Technology  </title>
        <meta name="description" content="Pages St.Joseph Institute Of Integrated Science And Technology " />
		<meta name="Keywords" content="Pages St.Joseph Institute Of Integrated Science And Technology " />
        <meta property="og:title" content="Pages St.Joseph Institute Of Integrated Science And Technology " />
	    <meta property="og:description" content="Pages St.Joseph Institute Of Integrated Science And Technology " />
        <meta property="og:url" content="http://stjosephinstitute.in" />
        <meta property="og:site_name" content="Pages St.Joseph Institute Of Integrated Science And Technology " />
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
								
                                    <h1><b> Search Results</b></h1>
                                    <hr>
                                </section>
                                <ul class="thumbnails">

                                    <li class="span8">
                                        <div class="/example-box">
                                            <!-- Button trigger modal -->
									
											 <table id="data-table" class="table table-hover">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Sl. No</th>
                                                                        <th>All Degree</th>
                                                                        <th>Year</th>
                                                                        <th>View Courses</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                     <?php
    $sql = "select * from jiier_paper where paper_name LIKE 'a%'";
	
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr>
                                                 <td><?php echo $row['id']; ?></td>
                                                 <td> <?php echo $row['paper_name']; ?></td>
                                                 <td> <?php echo $row['year']; ?></td>
												 
																																						                                <td>
<a type="button" class="btn btn-secondary" href="online-application-form.php?id=<?php echo $row['id']; ?>">Apply</a>

																</td>

                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    </tbody>
                                                                </table>

                                        </div>
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


        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>

        <script src="vendors/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
        <script src="vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
        <script src="vendors/bower_components/dropzone/dist/min/dropzone.min.js"></script>
        <script src="vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="vendors/bower_components/flatpickr/dist/flatpickr.min.js"></script>
        <script src="vendors/bower_components/nouislider/distribute/nouislider.min.js"></script>
        <script src="vendors/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="vendors/bower_components/trumbowyg/dist/trumbowyg.min.js"></script>
        <script src="vendors/bower_components/rateYo/min/jquery.rateyo.min.js"></script>
        <script src="vendors/bower_components/jquery-text-counter/textcounter.min.js"></script>
        <script src="vendors/bower_components/autosize/dist/autosize.min.js"></script>
		
		        <script src="js/app.min.js"></script>

</body>
</html>