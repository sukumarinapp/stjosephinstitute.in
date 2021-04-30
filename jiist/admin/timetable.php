<?php
session_start();
$page = "Timetable";
$page1 = "View Timetable";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$centre_id=$_SESSION['centre_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>JIIST</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
    
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
            <h1>View Timetable</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
      
	  
	  
	  
	   <div class="card">
            <div class="card-header">
              <h3 class="card-title">Timetable Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Course</th>
                  <th>Subject</th>
                  <th>Date & Time</th>                  
                  <th>Marks Per Question</th>                  
                  <th>Exam Duration (in Minutes)</th>                  
                  <th>No of Questions</th>
                  <th>Session</th>
                  <th style="width: 100px">Action</th>
                </thead>
                <tbody>
				
							
							<?php
                        $sql = "select a.subject_name,b.* from jiier_subject a,jiier_timetable b where a.id=b.subject_id";                      
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                          $exam_date=$row['exam_date'];
                          $edate2=explode(" ",$exam_date);
                          $edate=$edate2[0];
                          $etime=$edate2[1];
                          $edate=explode("-", $edate);
                          $exam_date=$edate[2]."-".$edate[1]."-".$edate[0]." ".$etime;
                          $course_id=$row['course_id'];
                          $sql2 = "select paper_name from jiier_paper where id=$course_id";
                          $result2 = mysqli_query($conn, $sql2);
                          $row2 = mysqli_fetch_assoc($result2);
                          $paper_name=$row2['paper_name'];
                            ?>

                <tr>
                  <td><?php echo $paper_name; ?></td>
                  <td><?php echo $row['subject_name']; ?></td>
                  <td><?php echo $exam_date; ?></td>
                  <td><?php echo $row['marks_per_question']; ?></td>
                  <td><?php echo $row['total_hours_in_seconds']; ?></td>
                  <td><?php echo $row['no_of_questions_per_student']; ?></td>
                  <td><?php echo $row['exam_session']; ?></td>
                                    
				  <td>
								<a class="btn btn-info fa fa-edit" href="edit-timetable.php?id=<?php echo $row['id']; ?>" title="Edit Timetable"></a>
				
								<a class="btn btn-info fa fa-trash"   href="delete-timetable.php?id=<?php echo $row['id']; ?>" title="Delete Timetable" style="font-weight:600px;"></a>
                               </td>
                </tr>
						<?php } ?>
                </tbody>
               <!-- <tfoot>
                <tr>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>User Type</th>
                  <th>Status</th>
                </tr>
                </tfoot>-->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
	<style>

	.btn {
  
    font-weight: 600;
}
</style>	
		
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

<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
