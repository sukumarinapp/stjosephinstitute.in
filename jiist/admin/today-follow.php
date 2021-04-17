<?php
session_start();
$page = "Follow";
$page1 = "Today Follow";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$date=date('y/m/d');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Students JIIER</title>

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
            <h1>Students</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
	   <div class="card">
            <div class="card-header">
              <h3 class="card-title">Staff Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Staff Followup Message</th>
                  <th>Date</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				
							<?php
                         if($_SESSION['user_type']=="Superadmin"){
                          $sql = "select * from jiier_users where followup_date='$date'";
                      }
                        else if($_SESSION['user_type']=="Admin"){
                            $sql = "select * from jiier_users where followup_date='$date'";
                        }
						else if($_SESSION['user_type']=="Staff"){
                            $sql = "select * from jiier_users where followup_date='$date'";
                        }
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                <tr>
                  <td><?php echo $row['full_name']; ?></td>
                  <td><?php echo $row['followup_message']; ?></td>
                  <td><?php echo $row['followup_date']; ?></td>
				  <td>
								
								<a class="btn btn-info fa fa-edit" href="add-staff-follow.php?id=<?php echo $row['id']; ?>" title="Add Follow "></a>
								<a class="btn btn-info fa fa-trash"   href="delete-student.php?id=<?php echo $row['id']; ?>" title="Delete" style="font-weight:600px;"></a>
                               </td>
                </tr>
						<?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
		  <div class="card">
            <div class="card-header">
              <h3 class="card-title">Students Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="exampleA" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Students Followup Message</th>
                  <th>Date</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				
							
							<?php
                         if($_SESSION['user_type']=="Superadmin"){
                          $sql = "select * from jiier_student where followup_date='$date'";
                      }
                        else if($_SESSION['user_type']=="Admin"){
                            $sql = "select * from jiier_student where followup_date='$date'";
                        }
						else if($_SESSION['user_type']=="Staff"){
                            $sql = "select * from jiier_student where followup_date='$date'";
                        }
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                <tr>
                  <td><?php echo $row['full_name']; ?></td>
                  <td><?php echo $row['followup_message']; ?></td>
                  <td><?php echo $row['followup_date']; ?></td>
				  <td>
								
								<a class="btn btn-info fa fa-edit" href="add-staff-follow.php?id=<?php echo $row['id']; ?>" title="Add Follow "></a>
								<a class="btn btn-info fa fa-trash"   href="delete-student.php?id=<?php echo $row['id']; ?>" title="Delete" style="font-weight:600px;"></a>
                               </td>
                </tr>
						<?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
	<style>

	.btn {
  
    font-weight: 600;
}
</style>	
		
  <!-- /.control-sidebar -->
 <?php include("footer.php"); ?>

</div>
</section>
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
    $(function () {
    $("#exampleA").DataTable();
    $('#exampleB').DataTable({
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
