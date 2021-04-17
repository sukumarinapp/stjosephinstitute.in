<?php
session_start();
$page = "Subject";
$page1 = "View Subject";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$id=$_GET['id'];
$user_id=$_SESSION['user_id'];

$course_id = "";
$semester_id = "";
$subject_name = "";
$subject_code = "";

if (isset($_POST['submit'])) {

$course_id = trim($_POST['course_id']);
$semester_id = trim($_POST['semester_id']);
$subject_name = trim($_POST['subject_name']);
$subject_code = trim($_POST['subject_code']);


$stmt = $conn->prepare("UPDATE jiier_subject set course_id=?,semester_id=?,subject_name=?,subject_code=? where id=?");
$stmt->bind_param("sssss",$course_id,$semester_id,$subject_name,$subject_code,$id);
$stmt->execute() or die ($stmt->error);

$subject_id=$id;
$total = count($_FILES['library']['name']);
for( $i=0 ; $i < $total ; $i++ ) {
  $tmpFilePath = $_FILES['library']['tmp_name'][$i];
  if ($tmpFilePath != ""){
    $ext = pathinfo($_FILES['library']['name'][$i], PATHINFO_EXTENSION);
    $stmt = $conn->prepare("INSERT INTO jiier_library (subject_id) VALUES (?)");
    $stmt->bind_param("s", $subject_id);
    $stmt->execute() or die ($stmt->error);
    $library_id=$stmt->insert_id;
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

$sql2 = "select * from jiier_subject where id=$id";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$subject_id = $row2['id'];
$subject_name = $row2['subject_name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Edit Subject</title>

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
            <h1>Edit Subject</h1>
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
            <h3 class="card-title">Subject</h3>

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
  <option <?php if($row2['course_id']==$row['id']) echo " selected "; ?> value="<?php echo $row['id']; ?>"><?php echo $row['paper_name']; ?> <?php echo $row['year']; ?></option>
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
  <option <?php if($row2['semester_id']==$row['id']) echo " selected "; ?> value="<?php echo $row['id']; ?>"><?php echo $row['years']; ?> Year, <?php echo $row['semester_list']; ?> Semester</option>
                           <?php } ?>
                                                </select>
                                            </div>  

                  <div class="form-group">
                    <label for="subject_name">Subject Name</label>
                    <input value="<?php echo $row2['subject_name']; ?>" type="text" class="form-control" id="subject_name" name="subject_name" required="required" placeholder="Subject Name">
                  </div>

                  <div class="form-group">
                    <label for="subject_code">Subject Code</label>
                    <input value="<?php echo $row2['subject_code']; ?>" type="text" class="form-control" id="subject_code" name="subject_code" required="required" placeholder="Subject Code" />
                  </div>

                <div class="form-group">
                    <label for="library">Library PDF</label>
                    <input accept="application/pdf" multiple="multiple" type="file" class="form-control" id="library" name="library[]" />
                </div>
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary text-center">Submit</button>
                </div>
              </form>
<div class="row">
  <div class="col-md-4">
    <table class="table table-bordered table-striped">
      <thead>
      <tr><th>Library</th><th>View</th><th>Delete</th></tr>
      </thead>
      <tbody>
<?php
$sql3 = "select * from jiier_library where subject_id=$subject_id";
$result3 = mysqli_query($conn, $sql3);
while($row3 = mysqli_fetch_assoc($result3)){
?>
      <tr><td><?php echo $subject_name; ?></td><td><a target="_blank" href="library/<?php echo $row3['library']; ?>">View</a></td><td><a href="delete-library.php?sub_id=<?php echo $subject_id; ?>&id=<?php echo $row3['id']; ?>">Delete</a></td></tr>
      
<?php
}
?> 
</tbody>
    </table>
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
