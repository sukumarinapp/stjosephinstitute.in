<?php
session_start();
$page = "Subject";
$page1 = "View Subject";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$s = 0;
$msg = "";
$msg_color = "";
$id = $_GET['id'];

if(isset($_REQUEST['delid']))
{
  $delid = $_REQUEST['delid'];
  $sql = "DELETE FROM questions WHERE id = '".$delid."'";
  $result = mysqli_query($conn, $sql);
  if($result)
  {
    $msg = "Question deleted successfully";
    $msg_color = "white";
  } else {
    $msg = "Failed to delete question";
    $msg_color = "red";
  }
}

if (isset($_POST['submit'])) {

    $question = trim($_POST['question']);
    $option_a = trim($_POST['option_a']);
    $option_b = trim($_POST['option_b']);
    $option_c = trim($_POST['option_c']);
    $option_d = trim($_POST['option_d']);
    $correct_option = trim($_POST['correct_option']);

    $sql = "INSERT INTO questions(course_id, question, option_a, option_b, option_c, option_d, correct_option) VALUES('".$course_id."', '".$question."', '".$option_a."', '".$option_b."', '".$option_c."', '".$option_d."', '".$correct_option."')";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
      $msg = 'Question added successfully';
      $msg_color = "green";
    } else {
      $msg = 'Failed to create question';
      $msg_color = "red";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Peritus Academy View Exams</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

     <?php include "header.php"; ?>

    <?php include "menu.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">

      <div class="row" id="addquestion">
        <div class="col-md-12">
          <button type="button" class="btn btn-info pull-right" style="margin-bottom:10px;">Add Question</button>
        </div>
      </div>



      <div class="row">
        <div class="col-md-12">

          <div class="login-panel panel panel-default" id="showquestion" style="display: none;">

                            <form method="post" action="questions.php?course_id=<?php echo $course_id; ?>">

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

                                    <div class="col-md-6">
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



      <div class="row">
                
         <div class="col-xs-12">
        
                       <div class="login-panel panel panel-default">

                         <span style="color:<?php echo $msg_color; ?>"><?php echo $msg; ?></span>




            <div class="table-responsive">
       <div class="box-header">
             <center> <h3>All Questions</h3> </center>
            <hr>


            </div>
   <div class="box-body">

                         <table id="example1" class="table table-bordered table-striped">
                    <thead>
                         <tr style="background-color: #2a6b90;color:white">
                            <th>S No</th>
                            <th>Question</th>
                            <th>Correct Option</th>
                            <th width="280px">Action</th>


                                        </tr>
                                    </thead>
                                       <tbody>

                        <?php

                          $sql = "select * from jiier_questions where subject_id=$id";

                      $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
              $s++;
                            ?>
                            <tr>
                <td><?php echo $s; ?></td>

              <td><?php echo $row['question']; ?></td>
              <td><?php echo $row['correct_option']; ?></td>
              <td>
                <a title="Edit Question" class="btn btn-info fa fa-edit" href="edit_question.php?id=<?php echo $row['id']; ?>"></a>
                <a title="Delete Question" class="btn btn-info fa fa-trash" href="questions.php?id=<?php echo $row['id']; ?>"></a>
              </td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                                        
                  </table>
                  <!-- /.box -->
                  <div class="form-group">


                                        <div class="form-group text-center">

                                           <a class="btn btn-info" onclick="goBack()">Go Back</a>

                                        </div>

                                    </div>
 </div>
            </div>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
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

    $('#addquestion').on('click', function() {
      $('#showquestion').toggle('slow');
    })
  })
function goBack() {
  window.history.back();
}

</script>
</body>
</html>
