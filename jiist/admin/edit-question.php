<?php
session_start();
$page = "Project";
$page1 = "View Project";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");

$id=$_GET['id'];
$subid=$_GET['subid'];

if (isset($_POST['submit'])) {

    $question = trim($_POST['question']);
    $option_a = trim($_POST['option_a']);
    $option_b = trim($_POST['option_b']);
    $option_c = trim($_POST['option_c']);
    $option_d = trim($_POST['option_d']);
    $correct_option = trim($_POST['correct_option']);

    $sql = "UPDATE jiier_questions SET question = '".$question."', option_a = '".$option_a."', option_b = '".$option_b."', option_c = '".$option_c."', option_d = '".$option_d."', correct_option = '".$correct_option."' WHERE id = '".$id."'";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("location: questions.php?id=".$subid);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Edit Project</title>

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
            <h1>Edit Question</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php
$sql = "select * from jiier_questions WHERE id = '".$id."'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
         <div class="row">
        <div class="col-md-12">

          <div class="login-panel panel panel-default">

                            <form method="post" action="">

                            <div class="panel-body">

                                <div class="row">

                                    <div class="col-md-12">

                                            <div class="form-group">

                                                <label for="full_name required"

                                                       class="control-label required">Question</label>

                                                <textarea required="required" type="text"

                                                       name="question" id="question" class="form-control"

                                                       placeholder="Question"><?php echo $row['question']; ?></textarea>

                                            </div>

                                    </div>


                                    <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="option_a"

                                                       class="control-label required">
                                                    <input type="radio" <?php if($row['correct_option'] == 'option_a') { echo 'checked'; } ?> id="option_a" name="correct_option" value="option_a">
                                                     Option A</label>

                                                <textarea required="required" type="text" name="option_a" id="option_a" class="form-control"><?php echo $row['option_a']; ?></textarea>

                                            </div>

                                    </div>


                                    <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="option_b"

                                                       class="control-label required">
                                                    <input type="radio" <?php if($row['correct_option'] == 'option_b') { echo 'checked'; } ?> id="option_b" name="correct_option" value="option_b">
                                                     Option B</label>

                                                <textarea required="required" type="text" name="option_b" id="option_b" class="form-control"><?php echo $row['option_b']; ?></textarea>

                                            </div>

                                    </div>


                                    <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="option_c"

                                                       class="control-label required">
                                                    <input type="radio" <?php if($row['correct_option'] == 'option_c') { echo 'checked'; } ?> id="option_c" name="correct_option" value="option_c">
                                                     Option C</label>

                                                <textarea required="required" type="text" name="option_c" id="option_c" class="form-control"><?php echo $row['option_c']; ?></textarea>

                                            </div>

                                    </div>



                                    <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="option_d"

                                                       class="control-label required">
                                                    <input type="radio" <?php if($row['correct_option'] == 'option_d') { echo 'checked'; } ?> id="option_d" name="correct_option" value="option_d">
                                                     Option D</label>

                                                <textarea required="required" type="text" name="option_d" id="option_d" class="form-control"><?php echo $row['option_d']; ?></textarea>

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
