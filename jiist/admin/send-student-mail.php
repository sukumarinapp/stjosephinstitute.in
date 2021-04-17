<?php
session_start();
$page = "Student";
$page1 = "View Student";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
error_reporting(1);
set_time_limit(0);
include "mailer/PHPMailerAutoload.php";

$user_id=$_SESSION['user_id'];
$student_id = $_GET['id'];
$email = $_GET['mail'];
$subject = "";
$mail_data = ""; 
$sent_date = date("Y-m-d");
$photo = "";

if(isset($_POST['submit'])){
	//echo "<pre>";
	//print_r($_FILES);
	//print_r($_POST);
	//echo "</pre>";
	//die;
	    $subject = trim($_POST['subject']);
    $mail_data = trim($_POST['mail_data']);

        $stmt = $conn->prepare("INSERT INTO jiier_mail (student_id,subject,mail_data,sent_date,user_id) VALUES (?,?,?,?,?)");

        $stmt->bind_param("sssss", $student_id,$subject,$mail_data,$sent_date,$user_id);
        $stmt->execute() or die ($stmt->error);

	
	$tag = "";
    $tag .= ' ' . $_POST['mail_data'] . '';
	
    $mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->Username = "sukumar.inapp2@gmail.com";
	$mail->Password = "rails2020";
	$mail->SetFrom("sukumar.inapp2@gmail.com");
	$mail->Subject = "$subject";
	$mail->MsgHTML($tag);
	
	if(isset($_FILES["attachment"])){
        for ($i = 0; $i < count($_FILES["attachment"]['name']); $i++) {
            $mail->AddAttachment($_FILES['attachment']['tmp_name'][$i],$_FILES['attachment']['name'][$i]);
        }        
    }

	$mail->AddAddress("$email");
	if (!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message has been sent";
	}
	

        header("location: students.php");
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
			  <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <input class="form-control" value="<?php echo $email; ?>" type="email" name="email" placeholder="To:">
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="subject" placeholder="Subject:">
                </div>
                <div class="form-group">
                    <textarea type="text" name="mail_data" id="compose-textarea" class="form-control" style="height: 300px"></textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
					<input type="file" name="attachment[]" multiple="multiple" size="30" style="width:300px;">

                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
								 <!-- <input type="submit" name="submit" value="Send">-->

                  <button type="submit" name="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
              </div>
			  </form>
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
