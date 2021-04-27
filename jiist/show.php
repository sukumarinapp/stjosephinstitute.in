<?php
$page = "Verification";
session_start();
include "admin/config.php";
$error = "";
$register_number = "";
$student_id = $_SESSION['student_id'];

$sql2 = "select * from jiier_student where id=$student_id";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$paper_id = $row2['course_id']; 
$photo = $row2['photo']; 
$result="";
if($row2["result"]==""){
    $result="Not Published";
}else{
    $result=$row2["result"];
}
$sql3 = "select * from jiier_paper where id=$paper_id";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($result3);
$paper_name = $row3['paper_name'];

$sql4 = "select a.*,b.program_name, c.degree_name,d.course_name from jiier_paper a,jiier_program b,jiier_degree c, jiier_degree_type d where a.program_id=b.id and a.degree_id=c.id and a.degree_type_id=d.id and a.id=$paper_id";
$result4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_assoc($result4);
?>
<!DOCTYPE html>
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
    <style type="text/css">
        .borderless td, .borderless th {
            border: none;
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>
    <?php include("menu.php"); ?>

    <section class="main-content">
        <div class="row">
            <div class="span12">
                <h1><b>Result</b></h1>
                <div class="row">
                <div class="span12" style="text-align: center">
                <table  class="table borderless">
                    <tr><th>Reg No</th><th><?php echo $row2['register_number']; ?></th></tr>
                    <tr><th>Name</th><th><?php echo $row2['full_name']; ?></th></tr>
                    <tr style="text-align: right"><th>Photo</th><th colspan="2"><img src="admin/uploads/<?php echo $row2['photo']; ?>" width="100" height="100" /></th></tr>
                    <tr><th>Father Name</th><th><?php echo $row2['father_name']; ?></th></tr>
                    <tr><th>Date of Birth</th><th><?php echo $row2['dateof_birth']; ?></th></tr>
                    <tr><th>Program</th><th><?php echo $row4['program_name']; ?></th></tr>
                    <tr><th>Degree</th><th><?php echo $row4['degree_name']; ?></th></tr>
                    <tr><th>Degree Type</th><th><?php echo $row4['course_name']; ?></th></tr>
                    <tr><th>Course</th><th><?php echo $paper_name; ?></th></tr>
                    <tr><th>Batch</th><th><?php echo $row2['enrolment_year']; ?></th></tr>
                    <tr><th>Sex</th><th><?php echo $row2['gender']; ?></th></tr>
                    <tr><th>Result</th><th><?php echo $result; ?></th></tr>
                    <tr><th>Institution</th><th>JIIST</th></tr>
                </table>
            </div>
        </div>
    </div>
</div>
    </section>
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