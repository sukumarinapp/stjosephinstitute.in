<?php
session_start();
$page = "Onine Exam";
$page1 = "Online Exam";
include "timeout.php";
include "../admin/config.php";
if (($_SESSION['user_type'] != "admin") && ($_SESSION['user_type'] != "Student")) header("location: index.php");
$user_id=$_SESSION['user_id'];
if(isset($_GET['exam_id']) AND isset($_GET['total']) AND isset($_GET['correct']))
{
  $exam_id = $_GET['exam_id'];
  $total = $_GET['total'];
  $correct = $_GET['correct'];
  $incorrect = $_GET['total'] - $_GET['correct'];
  $sql = "INSERT INTO jiier_results (exam_id, student_id, total, correct, incorrect) VALUES('".$exam_id."', '".$user_id."', '".$total."', '".$correct."', '".$incorrect."')";
  echo $sql;
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Peritus Academy Online Exam Records</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dataTables.responsive.css">
<script src="css/dataTables.responsive.js"></script>
  <link rel="stylesheet" href="css/dataTables.responsive.scss">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css">
.box {
  padding:15px;
  border:1px solid #999;
  background:orange;
}
.box h2, .box h3 {
  clear: both;
}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
     <?php include "header.php"; ?>
    <?php include "menu.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
 <br /> 
				 <div class="col-xs-12">
				
		                   <div class="login-panel panel panel-default">
       <div class="box-header">
             <center> <h3>Online Exam</h3> </center>
            </div>
   <div class="box-body">
<div class="row">
<div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="sml-box bg-aqua">
            <div class="inner">
			                <h3><?php echo $total; ?></h3>
              <p>Total Questions</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
  </div>
  <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
			                <h3><?php echo $correct; ?></h3>
              <p>Total Correct</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
  </div>
  <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
			                <h3><?php echo $incorrect; ?></h3>
              <p>Total Incorrect</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
  </div>
</div>
</div>
<div class="clearfix"></div>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
      <?php include "footer.php"; ?>
  <!-- Control Sidebar -->
     
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
function goBack() {
  window.history.back();
}
</script>
</body>
</html>