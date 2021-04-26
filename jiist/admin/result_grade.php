<?php
session_start();
$page = "Student";
$page1 = "View Student";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$id=$_GET['id'];
$user_id=$_SESSION['user_id'];
$centre_id=$_SESSION['centre_id'];
$msg = "";
$msg_color = "";
$lastup_date=date('y/m/d');
$followup_date=date('y/m/d');


$status = "";
$grade	 = "";

if (isset($_POST['submit'])) {

  $grade	 = trim($_POST['grade']);
  $result   = trim($_POST['result']);
  $stmt = $conn->prepare("UPDATE  jiier_student set result=?,grade=? where id=? ");
  $stmt->bind_param("sss", $result,$grade,$id);
  $stmt->execute() or die ($stmt->error);
  header("location: students.php");
}

$sql2 = "select * from jiier_student where id=$id";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$paper_id = $row2['course_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
 JIIST
  <title>Result & Grade JIIST</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
   <?php include("header.php"); ?>

  <?php include("menu.php"); ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Result & Grade</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                        <form method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="register_number">Register Number</label>
                    <input readonly required="required" value="<?php echo $row2['register_number']; ?>" type="text" class="form-control" name="register_number" required="required" placeholder="Register Number">
                  </div>

                  <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input readonly required="required" value="<?php echo $row2['full_name']; ?>" type="text" class="form-control" id="full_name" name="full_name" required="required" placeholder="Full Name">
                  </div>

                  <div class="form-group">
                    <?php
$sql3 = "select a.*,b.program_name, c.degree_name,d.course_name from jiier_paper a,jiier_program b,jiier_degree c, jiier_degree_type d where a.program_id=b.id and a.degree_id=c.id and a.degree_type_id=d.id and a.id=$paper_id";
                                            $result3 = mysqli_query($conn, $sql3);
                                            $row3 = mysqli_fetch_assoc($result3);
?>
              <label >Select Course (Program = <?php echo $row3['program_name']; ?>, Degree = <?php echo $row3['degree_name']; ?>, Degree Type = <?php echo $row3['course_name']; ?>)</label>
 <?php

  $sql = "select * from jiier_paper where id=$paper_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

?>
 <input readonly required="required" value="<?php echo $row['paper_name']; ?>" type="text" class="form-control" id="paper_name" name="paper_name" required="required" >                                                   
                  </div>
				    <div class="form-group">
                    <label name="result" for="result">Select Result</label>
                   <select required="required" class="form-control select2bs4" name="result" style="width: 100%;">
					 <option value="Pass" >Pass</option>
           <option value="Fail" >Fail</option>
                  </select>
                  </div>
				  
				   <div class="form-group">
                    <label for="grade">Select Grade </label>
                   <select required="required" class="form-control select2bs4" name="grade" style="width: 100%;">
                    <option value="<?php echo $row2['grade']; ?>"><?php echo $row2['grade']; ?></option>
					           <option selected value="S" > S</option>
                	   <option value="A" > A</option>
                     <option value="B" > B</option>
                     <option value="C" > C</option>		
                  </select>
                  </div>
				
				
                </div>
			
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
			  
          <!-- /.col (right) -->
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.control-sidebar -->
 <?php include("footer.php"); ?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

 
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>



</body>
</html>
