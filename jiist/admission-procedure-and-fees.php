<?php
$page = "Find And Apply";
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admission Procedure And Fees St.Joseph Institute of Integrated Science and Technology </title>
    <meta name="description"
          content="Admission Procedure and Fees St.Joseph Institute of Integrated Science and Technology "/>
    <meta name="Keywords"
          content="Admission Procedure and Fees St.Joseph Institute of Integrated Science and Technology "/>
    <meta property="og:title"
          content="Admission Procedure and Fees St.Joseph Institute of Integrated Science and Technology "/>

    <meta property="og:description"
          content="Admission Procedure and Fees St.Joseph Institute of Integrated Science and Technology "/>
    <meta property="og:url" content="http://www.stjosephinstitute.in/jiist/admission-procedure-and-fees.php"/>
    <meta property="og:site_name" content="St.Joseph Institute of Integrated Science and Technology "/>
    <meta name="twitter:description"
          content="Admission Procedure and Fees St.Joseph Institute of Integrated Science and Technology "/>
    <meta name="twitter:card" content="summary"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content='IE=8' http-equiv='X-UA-Compatible'/>
    <link rel="icon" href="./assets/images/sjei-logo.jpg"/>

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
                                    <h1><b>Admission Procedure and Fees</b></h1>
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
                                                                        <th>Program</th>
                                                                        <th>Fees Dtails</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                     <?php
                                            $sql2 = "select * from jiier_fees";
                                            $result2 = mysqli_query($conn, $sql2);
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                                ?>
                                                                        <tr>
                                                                            <td><?php echo $row2['id']; ?></td>
                                                                            <td> <?php echo $row2['program']; ?></td>
                                                                            <td> <?php echo $row2['fees_details']; ?></td>
																		
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
</body>
</html>