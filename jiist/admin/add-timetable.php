<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$page = "Timetable";
$page1 = "Add Timetable";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$course_id = "";
$semester_id = "";
$exam_date = "";
$exam_session = "";
if (isset($_POST['submit'])) {
  $course_id = trim($_POST['course_id']);
  $subject_id = trim($_POST['subject_id']);
  $exam_date = trim($_POST['exam_date']);
  //$exam_session = trim($_POST['exam_session']);
  $marks_per_question = trim($_POST['marks_per_question']);
  $total_hours_in_minutes = trim($_POST['total_hours_in_minutes']);
  $no_of_questions_per_student = trim($_POST['no_of_questions_per_student']);

  $stmt = $conn->prepare("INSERT INTO jiier_timetable (course_id,subject_id,exam_date,exam_session,marks_per_question,total_hours_in_minutes,no_of_questions_per_student) VALUES (?,?,?,?,?,?,?)");
  $stmt->bind_param("sssssss", $course_id,$subject_id,$exam_date,$exam_session,$marks_per_question,$total_hours_in_minutes,$no_of_questions_per_student);
  $stmt->execute() or die ($stmt->error);
  header("location: timetable.php");
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
            <h1>Add Timetable</h1>
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
            <h3 class="card-title">Add Timetable Details</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                        <form method="post" action="">
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
                                                <label>Select Subject</label>
                        <select name="subject_id" class="form-control select2bs4" required="required" >
                         <option value="">---Select---</option>
 <?php
  $sql = "select a.semester_list,b.id,b.subject_name from jiier_semester a,jiier_subject b where a.id=b.semester_id order by a.id";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result)) {

?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['semester_list']." - ".$row['subject_name']; ?></option>
                           <?php } ?>
                                                </select>
                                            </div>  

                  <div class="form-group">
                    <label for="exam_date">Exam Date</label>
                    <input onkeydown="return false" type="datetime-local" class="form-control" id="exam_date" name="exam_date" required="required" placeholder="Exam Date">
                  </div>

                  <div class="form-group">
                    <label for="exam_date">Marks Per Question</label>
                    <input onkeypress="return isNumber(event)" type="text" class="form-control" id="marks_per_question" name="marks_per_question" maxlength="2" required="required" placeholder="Marks Per Question">
                  </div>

                  <div class="form-group">
                    <label for="exam_date">Exam Duration (in Minutes)</label>
                    <input onkeypress="return isNumber(event)" type="text" class="form-control" id="total_hours_in_minutes" name="total_hours_in_minutes" maxlength="3" required="required" placeholder="Exam Hours (in Minutes)">
                  </div>

                  <div class="form-group">
                    <label for="exam_date">No of Questions</label>
                    <input onkeypress="return isNumber(event)" type="text" class="form-control" id="no_of_questions_per_student" name="no_of_questions_per_student" maxlength="2" required="required" placeholder="Number of Questions per Student">
                  </div>

                  <!-- <div class="form-group">
                    <label for="exam_session">Session</label>
                    <select class="form-control" id="exam_session" name="exam_session" required="required">
                      <option value="Forenoon">Forenoon</option>
                      <option value="Afternoon">Afternoon</option>
                    </select>
                  </div> -->

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

  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
  }

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
