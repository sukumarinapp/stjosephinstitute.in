<?php
session_start();
$page = "Course";
$page1 = "View Course";
include "timeout.php";
include "config.php";
$program_id=0;
$degree_id=0;
$degree_type_id=0;
$paper_name = "";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$id=$_GET['id'];

$degree_id= "";
$paper_name= "";

if (isset($_POST['submit'])) {
$paper_name = trim($_POST['paper_name']);
$program_id = trim($_POST['program_id']);
$degree_type = trim($_POST['degree_type']);
$degree_type_id = trim($_POST['degree_type_id']);
   

        $stmt = $conn->prepare("UPDATE  jiier_paper set paper_name=?,program_id=?,degree_type=?,degree_type_id=? where id=?");

        $stmt->bind_param("sssss",$paper_name,$program_id,$degree_type,$degree_type_id,$id);
        $stmt->execute();
        $id=$stmt->insert_id;
		
       	header("location: course.php");

        }

$sql2 = "select * from jiier_paper where id=$id";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$program_id=$row2['program_id'];
$degree_id=$row2['degree_id'];
$degree_type_id=$row2['degree_type_id'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Edit Course JIIER</title>

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
            <h1>Edit Course</h1>
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
            <h3 class="card-title">Edit Course Details</h3>

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
  <label>Select Program *</label>
  <select onchange="load_degree()" name="program_id" id="program_id" class="form-control" required="required" >
    <option value="">---Select Program---</option>
    <?php
      $sql = "select * from jiier_program order by program_name";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($result)) { ?>
        <option <?php if($row2['program_id']==$row['id']) echo " selected "; ?> value="<?php echo $row['id']; ?>"><?php echo $row['program_name']; ?></option>
      <?php } ?>
  </select>
</div>  

<div class="form-group" id="degree_div" >
  <label>Select Degree *</label>
  <select onchange="load_degree_type()" name="degree_id" id="degree_id" class="form-control" required="required" >
    <option value="">---Select Degree---</option>
    <?php
    $sql="select * from jiier_degree where program_id=$program_id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){ ?>
      <option <?php if($degree_id==$row['id']) echo " selected "; ?> value="<?php echo $row['id']; ?>"><?php echo $row['degree_name']; ?></option>
    <?php } ?>
  </select>
</div> 

<div class="form-group" id="degree_type_div">
  <label>Select Degree Type *</label>
  <select name="degree_type_id" id="degree_type_id" class="form-control" required="required" >
    <option value="">---Select Degree Type---</option>
    <?php
    $sql="select * from jiier_degree_type where degree_id=$degree_id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){ ?>
      <option <?php if($degree_type_id==$row['id']) echo " selected "; ?> value="<?php echo $row['id']; ?>"><?php echo $row['course_name']; ?></option>
    <?php } ?>
  </select>
  </select>
</div> 

                  <div class="form-group">
                    <label for="paper_name">Paper Name</label>
                    <input value="<?php echo $row2['paper_name']; ?>" type="text" class="form-control" id="paper_name" name="paper_name" placeholder="Paper Name">
                  </div>
            
               
                    </div>
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
  function load_degree(){
    var program_id = $("#program_id").val();
    $.ajax({
      type: 'POST',
      url: 'load_degree.php',
      data: {
          program_id: program_id
      },
      success: function (response) {
          response=JSON.parse(response); 
          var html="";  
          html = html + "<label>Select Degree *</label>";
          html = html + "<select onchange='load_degree_type()' id='degree_id' name='degree_id' class='form-control' required='required'>";
          html = html + "<option value=''>---Select Degree---</option>";
          for(var i = 0; i < response.length; i++) {
            var obj = response[i];
            html = html + "<option value='"+obj.degree_id+"'>"+obj.degree_name+"</option>";
          } 
          html = html + "</select>";
          $("#degree_div").html(html);        
      },
      error : function(error){
          console.log(error);
      }
    });
  }

    function load_degree_type(){
      var degree_id = $("#degree_id").val();  
      $.ajax({
        type: 'POST',
        url: 'load_degree_type.php',
        data: {
            degree_id: degree_id
        },
        success: function (response) {
          response=JSON.parse(response); 
          var html="";  
          html = html + "<label>Select Degree Type *</label>";
          html = html + "<select id='degree_type_id' name='degree_type_id' class='form-control' required='required'>";
          html = html + "<option value=''>---Select Degree Type---</option>";
          for(var i = 0; i < response.length; i++) {
            var obj = response[i];
            html = html + "<option value='"+obj.id+"'>"+obj.course_name+"</option>";
          } 
          html = html + "</select>";
          $("#degree_type_div").html(html);           
        },
        error : function(error){
            console.log(error);
        }
      });
    }
</script>



</body>
</html>
