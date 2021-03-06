<?php
session_start();
$page = "Subject";
$page1 = "View Subject";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $question = trim($_POST['question']);
    $option_a = trim($_POST['option_a']);
    $option_b = trim($_POST['option_b']);
    $option_c = trim($_POST['option_c']);
    $option_d = trim($_POST['option_d']);
    $correct_option = trim($_POST['correct_option']);
    $sql = "INSERT INTO jiier_questions(subject_id, question, option_a, option_b, option_c, option_d, correct_option) VALUES('".$id."', '".$question."', '".$option_a."', '".$option_b."', '".$option_c."', '".$option_d."', '".$correct_option."')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

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
            <h1>Questions</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
      <div class="row" >
        <div class="col-md-12">
          <button id="addquestion" type="button" class="btn btn-info pull-right" style="margin-bottom:10px;" >Add Question</button>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">

          <div class="login-panel panel panel-default" id="showquestion" style="display: none;">

                            <form method="post" action="">

                            <div class="panel-body">

                                <div class="row">

                                    <div class="col-md-12">

                                            <div class="form-group">

                                                <label for="full_name required"

                                                       class="control-label required">Question</label>

                                                <textarea required="required" type="text"

                                                       name="question" id="question" class="form-control"

                                                       placeholder="Question"></textarea>

                                            </div>

                                    </div>


                                    <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="option_a"

                                                       class="control-label required">
                                                    <input type="radio" checked id="option_a" name="correct_option" value="option_a">
                                                     Option A</label>

                                                <textarea required="required" type="text" name="option_a" id="option_a" class="form-control"></textarea>

                                            </div>

                                    </div>


                                    <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="option_b"

                                                       class="control-label required">
                                                    <input type="radio" id="option_b" name="correct_option" value="option_b">
                                                     Option B</label>

                                                <textarea required="required" type="text" name="option_b" id="option_b" class="form-control"></textarea>

                                            </div>

                                    </div>


                                    <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="option_c"

                                                       class="control-label required">
                                                    <input type="radio" id="option_c" name="correct_option" value="option_c">
                                                     Option C</label>

                                                <textarea required="required" type="text" name="option_c" id="option_c" class="form-control"></textarea>

                                            </div>

                                    </div>



                                    <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="option_d"

                                                       class="control-label required">
                                                    <input type="radio" id="option_d" name="correct_option" value="option_d">
                                                     Option D</label>

                                                <textarea required="required" type="text" name="option_d" id="option_d" class="form-control"></textarea>

                                            </div>

                                    </div>

                                    <div class="col-md-12">
                    <div class="form-group">


                                        <div class="form-group text-center">

                                            <input required="required" class="btn btn-info"

                                                   type="submit"

                                                   name="submit" value="Save"/>


                                        </div>

                                    </div>
                                    </div>

                            </div>

                        </form>

          </div>

        </div>
      </div>
	  
	  
	  
	   <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S No</th>
                  <th>Question</th>
                  <th>Correct Option</th>
                  <th width="100px">Action</th>
                </thead>
                <tbody>
				
							
							<?php
                        $sql = "select * from jiier_questions where subject_id=$id order by id desc";
                        $result = mysqli_query($conn, $sql);
                        $i=0;
                        while ($row = mysqli_fetch_assoc($result)) {
                          $i++;
                            ?>

                <tr>
                  <td><?php echo $i; ?></td>

              <td><?php echo $row['question']; ?></td>
              <td><?php echo $row['correct_option']; ?></td>
              <td>
                <a title="Edit Question" class="btn btn-info fa fa-edit" href="edit-question.php?id=<?php echo $row['id']; ?>&subid=<?php echo $id; ?>"></a>
                <a title="Delete Question" class="btn btn-info fa fa-trash" href="delete_question.php?id=<?php echo $row['id']; ?>&subid=<?php echo $id; ?>"></a>
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

    $('#addquestion').on('click', function() {
      $('#showquestion').toggle('slow');
    })
  });
</script>
</body>
</html>
