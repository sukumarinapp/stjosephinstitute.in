<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$page = "Subject";
$page1 = "Add Subject";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$course_id = "";
$semester_id = "";
$subject_name = "";
$subject_code = "";
if (isset($_POST['submit'])) {
  $course_id = trim($_POST['course_id']);
  $semester_id = trim($_POST['semester_id']);
  $subject_name = trim($_POST['subject_name']);
  $subject_code = trim($_POST['subject_code']);
  $stmt = $conn->prepare("INSERT INTO jiier_subject (course_id,semester_id,subject_name,subject_code) VALUES (?,?,?,?)");
  $stmt->bind_param("ssss", $course_id,$semester_id,$subject_name,$subject_code);
  $stmt->execute() or die ($stmt->error);
  $subject_id=$stmt->insert_id;
  $total = count($_FILES['library']['name']);
  for( $i=0 ; $i < $total ; $i++ ) {
    $tmpFilePath = $_FILES['library']['tmp_name'][$i];
    if ($tmpFilePath != ""){
      $ext = pathinfo($_FILES['library']['name'][$i], PATHINFO_EXTENSION);

      $sql = "INSERT INTO jiier_library (subject_id) VALUES ($subject_id)";
      mysqli_query($conn, $sql) or die(mysqli_error($conn));
      $library_id = mysqli_insert_id($conn);

      $library = $library_id . "." . $ext;
      $newFilePath = "library/" . $library;
      $stmt = $conn->prepare("UPDATE jiier_library set library=? where id=?");
      $stmt->bind_param("ss", $library,$library_id);
      $stmt->execute() or die ($stmt->error);
      move_uploaded_file($tmpFilePath, $newFilePath);
    }
  }
  header("location: subject.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Add Subject</title>

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
            <h1>Add Subject</h1>
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
            <h3 class="card-title">Add Subject Details</h3>

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
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['paper_name']; ?> - <?php echo $row['year']; ?> - <?php echo $row['id']; ?></option>
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
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['semester_list']; ?></option>
                           <?php } ?>
                                                </select>
                                            </div>  

                  <div class="form-group">
                    <label for="subject_name">Subject Name</label>
                    <input type="text" class="form-control" id="subject_name" name="subject_name" required="required" placeholder="Subject Name">
                  </div>

                  <div class="form-group">
                    <label for="subject_code">Subject Code</label>
                    <input type="text" class="form-control" id="subject_code" name="subject_code" required="required" placeholder="Subject Code">
                  </div>

                  <div class="form-group">
                    <label for="subject_code">Library PDF</label>
                    <input accept="application/pdf" multiple="multiple" type="file" class="form-control" id="library" name="library[]" />
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
