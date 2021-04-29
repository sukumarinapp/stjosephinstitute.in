<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
$page = "Lab";
$page1 = "";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$user_id=$_SESSION['user_id'];
if (isset($_POST['submit'])) {
  $query="delete from jiier_lab"; 
  mysqli_query($conn,$query) or die(mysqli_error($conn));
  for( $i=0 ; $i < count($_POST['title']); $i++ ) {
    $title = ($_POST['title'][$i]);
    $video = ($_POST['video'][$i]);
    if($title != "" && $video != ""){
      $stmt = $conn->prepare("INSERT INTO jiier_lab (title,video) VALUES (?,?)");
      $stmt->bind_param("ss",$title,$video);
      $stmt->execute() or die ($stmt->error);
    }
  }
  header("location: lab.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Virtual Laboratory</title>

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
            <h1>Virtual Laboratory</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          
          <form method="post" action="">
          
<div class="card-body">
  <div class="row" id="videoDiv">
<?php
$sql3 = "select * from jiier_lab";
$result3 = mysqli_query($conn, $sql3);
while($row3 = mysqli_fetch_assoc($result3)){
?>
    <div class="col-md-6"> 
      <label>Title *</label>
      <input value="<?php echo $row3['title']; ?>" class="form-contol" type="text" name="title[]" maxlength="50" size="50">
    </div>
    <div class="col-md-6"> 
      <label>Video *</label>
      <input value="<?php echo $row3['video']; ?>" class="form-contol" type="text" name="video[]" maxlength="100" size="50">
    </div> 
<?php
}
?> 
    <div class="col-md-6"> 
      <label>Title *</label>
      <input class="form-contol" type="text" name="title[]" maxlength="50" size="50">
    </div>
    <div class="col-md-6"> 
      <label>Video *</label>
      <input class="form-contol" type="text" name="video[]" maxlength="100" size="50">
    </div>
    <div class="col-md-6"> 
       <label>Title *</label>
      <input class="form-contol" type="text" name="title[]" maxlength="50" size="50">
    </div>
    <div class="col-md-6"> 
       <label>Video *</label>
      <input class="form-contol" type="text" name="video[]" maxlength="100" size="50">
    </div>
    <div class="col-md-6"> 
       <label>Title *</label>
      <input class="form-contol" type="text" name="title[]" maxlength="50" size="50">
    </div>
    <div class="col-md-6"> 
       <label>Video *</label>
      <input class="form-contol" type="text" name="video[]" maxlength="100" size="50">
    </div>
    <div class="col-md-6"> 
       <label>Title *</label>
      <input class="form-contol" type="text" name="title[]" maxlength="50" size="50">
    </div>
    <div class="col-md-6"> 
       <label>Video *</label>
      <input class="form-contol" type="text" name="video[]" maxlength="100" size="50">
    </div>
    <div class="col-md-6"> 
       <label>Title *</label>
      <input class="form-contol" type="text" name="title[]" maxlength="50" size="50">
    </div>
    <div class="col-md-6"> 
       <label>Video *</label>
      <input class="form-contol" type="text" name="video[]" maxlength="100" size="50">
    </div>
  </div>
</div>

  <div class="card-body">
    <a class="btn btn-success" href="javascript:add_more();" >Add More Video</a>
  </div>

  <div class="card-body"b style="text-align: center">
    <button type="submit" name="submit" class="btn btn-primary text-center">Submit</button>
  </div>
              </div>
              </div>
            </div>
          </div>



              </form>
              <div class="card-body">
<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-striped">
      <thead>
      <tr><th>Title</th><th>View</th><th>Delete</th></tr>
      </thead>
      <tbody>
<?php
$sql3 = "select * from jiier_lab";
$result3 = mysqli_query($conn, $sql3);
while($row3 = mysqli_fetch_assoc($result3)){
?>
      <tr><td><?php echo $row3['title']; ?></td><td><a target="_blank" href="lab/<?php echo $row3['video']; ?>">View</a></td><td><a href="delete-lab.php?id=<?php echo $row3['id']; ?>">Delete</a></td></tr>
      
<?php
}
?> 
</tbody>
    </table>
  </div>
</div>  
</div> 
            </div>

    
          <!-- /.col (right) -->
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
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
<script language="javascript">
  function add_more() {
    var html='';
    html =html + '<div class="col-md-6">'; 
       html =html + '<label>Title * </label>'; 
      html =html + '<input class="form-contol" type="text" name="title[]" maxlength="50" size="50">'; 
    html =html + '</div>'; 
    html =html + '<div class="col-md-6">';  
       html =html + '<label>Video *</label>'; 
      html =html + '<input class="form-contol" type="text" name="video[]" maxlength="100" size="50">'; 
    html =html + '</div>'; 
    $("#videoDiv").append(html);
  }
</script>
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

<!--
<?php
                                            //$sql = "select * from jiier_paper where id=$id";
$sql = "select a.*,b.program_name, c.degree_name,d.degree_type_name from jiier_paper a,jiier_program b,jiier_degree c, jiier_degree_type d where a.program_id=b.id and a.degree_id=c.id and a.degree_type_id=d.id and a.id=$id";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
											$degree_type_id = $row['100'];
                                                ?>	
												<textarea rows="4" cols="50" type="text" name="course"  size="30"  style="width:300px;">Program = <?php echo $row['program_name']; ?>,
												Degree = <?php echo $row['degree_name']; ?>,
												Degree Type = <?php echo $row['degree_type_name']; ?>,
												Paper = <?php echo $row['paper_name']; ?>
												</textarea>
															 <?php } ?>
															 -->

</body>
</html>
