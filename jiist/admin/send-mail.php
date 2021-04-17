<?php
session_start();
$page = "Users";
$page1 = "Add User";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$user_id=$_SESSION['user_id'];
$msg = "";
$msg_color = "";
$date=date('y/m/d');
$full_name = "";
$email = "";
$status = "Active";
$password = "";
$mobile_number = "";
$address = "";
$user_type = "";
$photo = "";

if (isset($_POST['submit'])) {

    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $user_type = trim($_POST['user_type']);
    $mobile_number = trim($_POST['mobile_number']);
    $address = trim($_POST['address']);


    $sql = "SELECT * FROM jiier_users WHERE trim(email)='$email'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
        $msg = "Username or Email already in use";
        $msg_color = "red";
    } else {
        $msg_color = "green";
        if($_SESSION['user_type']=="Superadmin") {
            $msg = "Centre added successfully";
        }else{
            $msg = "User added successfully";
        }
        $stmt = $conn->prepare("INSERT INTO jiier_users (full_name,email,status,password,mobile_number,address,user_type,date,user_id) VALUES (?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("sssssssss", $full_name,$email,$status, $password,$mobile_number, $address,$user_type,$date,$user_id);

        $stmt->execute();
        $id=$stmt->insert_id;

        $file_name = $_FILES['logo']['name'];
        if (trim($file_name) != "") {
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name = $id . "." . $ext;
            $query = "update jiier_users set logo = '" . $file_name . "' where id=$id";
            mysqli_query($conn, $query);
            $target_path = "uploads/logo/";
            $target_path = $target_path . $file_name;
            move_uploaded_file($_FILES['logo']['tmp_name'], $target_path);
        }

        if($_SESSION['user_type']=="Superadmin"){
            $sql="update jiier_users set centre_id=$centre_id where id=$id";
            mysqli_query($conn,$sql);
        }else if($_SESSION['user_type']=="Admin"){
            $sql="update jiier_users set centre_id=$centre_id, user_type='Staff' where id=$id";
            mysqli_query($conn,$sql);
        }

        header("location: users.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Add User JIIER</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
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
            <h1>Compose Mail</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Compose New Message</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <input class="form-control" placeholder="To:">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Subject:">
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px"></textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" name="attachment">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
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
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>


</body>
</html>
