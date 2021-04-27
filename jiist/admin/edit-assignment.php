<?php
session_start();
$page = "Subject";
$page1 = "Add Assignment";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");

$id=$_GET['id'];
$user_id=$_SESSION['user_id'];

$course_id = "";
$semester_id = "";
$title = "";
$last_date = "";
if (isset($_POST['submit'])) {
  $course_id = trim($_POST['course_id']);
  $semester_id = trim($_POST['semester_id']);
  $title = trim($_POST['title']);
  $last_date = trim($_POST['last_date']);

  $stmt = $conn->prepare("UPDATE jiier_assignment set course_id=?,semester_id=?,title=?,last_date=? where id=?");
  $stmt->bind_param("sssss",$course_id,$semester_id,$title,$last_date,$id);
  $stmt->execute() or die ($stmt->error);

  $file_name = $_FILES['question']['name'];
  if (trim($file_name) != "") {
      $ext = pathinfo($file_name, PATHINFO_EXTENSION);
      $file_name = $id . "." . $ext;
      $query = "update jiier_assignment set question = '" . $file_name . "' where id=$id";
      mysqli_query($conn, $query) or die(mysqli_error($conn));
      $target_path = "assignment/";
      $target_path = $target_path . $file_name;
      move_uploaded_file($_FILES['question']['tmp_name'], $target_path);
  }
  header("location: assignment.php");
}

$sql2 = "select * from jiier_assignment where id=$id";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Add Assignment</title>

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
            <h1>Add Assignment</h1>
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
            <h3 class="card-title">Add Assignment Details</h3>

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
                                                <label>Select Course</label>
                        <select name="course_id" class="form-control select2bs4" required="required" >
                         <option value="">---Select---</option>
 <?php
  $sql = "select * from jiier_paper";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result)) {

?>
                                                    <option  <?php if($row2['course_id']==$row['id']) echo " selected "; ?> value="<?php echo $row['id']; ?>"><?php echo $row['paper_name']; ?> - <?php echo $row['year']; ?> - <?php echo $row['id']; ?></option>
                           <?php } ?>
                                                </select>
                                            </div>  

                     <div class="form-group">
                                                <label>Select Semester</label>
                        <select name="semester_id" class="form-control select2bs4" required="required" >
                         <option value="">---Select---</option>
 <?php
  $sql = "select * from jiier_semester order by id";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result)) {

?>
                                                    <option  <?php if($row2['semester_id']==$row['id']) echo " selected "; ?> value="<?php echo $row['id']; ?>"><?php echo $row['years']; ?> Year, <?php echo $row['semester_list']; ?> Semester</option>
                           <?php } ?>
                                                </select>
                                            </div>  

                  <div class="form-group">
                    <label for="title">Assigment Title</label>
                    <input  value="<?php echo $row2['title']; ?>" type="text" class="form-control" id="title" name="title" required="required" maxlength="50" placeholder="Assigment Title">
                  </div>

                  <div class="form-group">
                    <label for="last_date">Last Date</label>
                    <input  value="<?php echo $row2['last_date']; ?>"  type="date" class="form-control" id="last_date" name="last_date" required="required" >
                  </div>

                  <div class="form-group">
                    <label for="question">Question(PDF)</label>
                    <input accept="application/pdf" type="file" class="form-control" id="question" name="question" />
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


<script>
$(document).ready(function() {
$('#category-dropdown').on('change', function() {
var category_id = this.value;
$.ajax({
url: "fetch-semester.php",
type: "POST",
data: {
category_id: category_id
},
cache: false,
success: function(result){
$("#sub-category-dropdown").html(result);
}
});
});
});
</script>

</body>
</html>
