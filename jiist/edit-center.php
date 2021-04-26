<?php
session_start();
$page = "Centers";
$page1 = "View Center";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$id=$_GET['id'];
$user_id=$_SESSION['user_id'];
$centre_id=$_SESSION['centre_id'];
$msg = "";
$msg_color = "";
$lastup_date=date('y/m/d');
$name_of_the_organization = "";
$register_number = "";
$type_of_organization = "";
$address = "";
$location = "";
$district = "";
$year_of_establishment = "";
$year_of_experience = "";
$center_total_area = "";
$no_of_class_rooms = "";
$No_of_laboratories = "";
$no_of_staff_available = "";
$remark_if_any = "";
$pan_no_of_organization = "";
$mobile_number = "";
$email = "";
$website = "";
$institute_profile_promoter_profile = "";
$status = "";
$photo = "";

if (isset($_POST['submit'])) {

$name_of_the_organization = trim($_POST['name_of_the_organization']);
$register_number = trim($_POST['register_number']);
$type_of_organization = trim($_POST['type_of_organization']);
$address = trim($_POST['address']);
$location = trim($_POST['location']);
$district = trim($_POST['district']);
$year_of_establishment = trim($_POST['year_of_establishment']);
$year_of_experience = trim($_POST['year_of_experience']);
$center_total_area = trim($_POST['center_total_area']);
$no_of_class_rooms = trim($_POST['no_of_class_rooms']);
$no_of_laboratories = trim($_POST['no_of_laboratories']);
$no_of_staff_available = trim($_POST['no_of_staff_available']);
$remark_if_any = trim($_POST['remark_if_any']);
$pan_no_of_organization = trim($_POST['pan_no_of_organization']);
$mobile_number = trim($_POST['mobile_number']);
$email = trim($_POST['email']); 
$website = trim($_POST['website']);
$institute_profile_promoter_profile = trim($_POST['institute_profile_promoter_profile']);
$status = trim($_POST['status']);
   
	    $stmt = $conn->prepare("UPDATE jiier_users set centre_id=?,name_of_the_organization=?,register_number=?,type_of_organization=?,address=?,location=?,district=?,year_of_establishment=?,year_of_experience=?,center_total_area=?,no_of_class_rooms=?,no_of_laboratories=?,no_of_staff_available=?,remark_if_any=?,pan_no_of_organization=?,mobile_number=?,email=?,website=?,institute_profile_promoter_profile=?,status=? where id=?");

        $stmt->bind_param("sssssssssssssssssssss", $centre_id,$name_of_the_organization,$register_number,$type_of_organization,$address,$location,$district,$year_of_establishment,$year_of_experience,$center_total_area,$no_of_class_rooms,$No_of_laboratories,$no_of_staff_available,$remark_if_any,$pan_no_of_organization,$mobile_number,$email,$website,$institute_profile_promoter_profile,$status,$id);
        $stmt->execute() or die ($stmt->error);

		        header("location: view-centers.php");
    }
$sql = "select * from jiier_users where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Edit Center JIIST</title>

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
            <h1>Edit Center</h1>
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
            <h3 class="card-title">Edit Center Details</h3>

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
                    <label for="register_number">Center Code *</label>
                    <input value="JIISTC<?php echo $row['register_number']; ?>" type="text" class="form-control" id="register_number" name="register_number" required="required" placeholder="Center Code">
                  </div>
                  <div class="form-group">
                    <label for="name_of_the_organization">Name of the Organization</label>
                    <input value="<?php echo $row['name_of_the_organization']; ?>" type="text" class="form-control" id="name_of_the_organization" name="name_of_the_organization" placeholder="Name of the Organization">
                  </div>
				  <div class="form-group">
                    <label for="type_of_organization">Type of Organization</label>
                    <input value="<?php echo $row['type_of_organization']; ?>" type="text" class="form-control" id="type_of_organization" name="type_of_organization" placeholder="Type of Organization">
                  </div>

				  <div class="form-group">
                    <label for="year_of_establishment">Year of Establishment</label>
                    <input value="<?php echo $row['year_of_establishment']; ?>" type="year" name="year_of_establishment" class="form-control" id="year_of_establishment" placeholder="Year of Establishment">
                  </div>
				  <div class="form-group">
                    <label for="year_of_experience">Year of Experience</label>
                    <input value="<?php echo $row['year_of_experience']; ?>" type="year" name="year_of_experience" class="form-control" id="year_of_experience" placeholder="Year of Experience">
                  </div>
				  <div class="form-group">
                    <label for="center_total_area">Center Total Area</label>
                    <input value="<?php echo $row['center_total_area']; ?>" type="text" name="center_total_area" class="form-control" id="center_total_area" placeholder="Center Total Area">
                  </div> 
				  <div class="form-group">
                    <label for="no_of_class_rooms">No of class Rooms</label>
                    <input  value="<?php echo $row['no_of_class_rooms']; ?>" type="text" name="no_of_class_rooms" class="form-control" id="no_of_class_rooms" placeholder="No of class Rooms">
                  </div>
				  <div class="form-group">
                    <label for="no_of_laboratories">No of Laboratories</label>
                    <input  value="<?php echo $row['no_of_laboratories']; ?>" type="text" name="no_of_laboratories" class="form-control" id="no_of_laboratories" placeholder="No of Laboratories">
                  </div>
				  <div class="form-group">
                    <label for="no_of_staff_available">No of staff Available</label>
                    <input  value="<?php echo $row['no_of_staff_available']; ?>" type="text" name="no_of_staff_available" class="form-control" id="no_of_staff_available" placeholder="No of staff Available">
                  </div>
				  <div class="form-group">
                    <label for="remark_if_any">Remark if Any</label>
                    <input  value="<?php echo $row['remark_if_any']; ?>" type="text" name="remark_if_any" class="form-control" id="remark_if_any" placeholder="Remark if Any">
                  </div>
				  <div class="form-group">
                    <label for="pan_no_of_organization">Pan no of Organization</label>
                    <input  value="<?php echo $row['pan_no_of_organization']; ?>" type="text" name="pan_no_of_organization" class="form-control" id="pan_no_of_organization" placeholder="Pan no of Organization">
                  </div> 
				  <div class="form-group">
                    <label for="mobile_number">Mobile Number</label>
                    <input  value="<?php echo $row['mobile_number']; ?>" type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Mobile Number">
                  </div>
				  <div class="form-group">
                    <label for="email">Email ID</label>
                    <input  value="<?php echo $row['email']; ?>" type="email" name="email" class="form-control" id="email" placeholder="Email Id">
                  </div>
				  <div class="form-group">
                    <label for="website">Website</label>
                    <input  value="<?php echo $row['website']; ?>" type="text" name="website" class="form-control" id="website" placeholder="Website">
                  </div>
				  <div class="form-group">
                    <label for="institute_profile_promoter_profile">Institute profile promoter Profile</label>
                    <input  value="<?php echo $row['institute_profile_promoter_profile']; ?>" type="text" name="institute_profile_promoter_profile" class="form-control" id="institute_profile_promoter_profile" placeholder="Institute profile promoter Profile">
                  </div>
				  <div class="form-group">
                  <label>User Status</label>
                  <select class="form-control select2bs4" name="status" style="width: 100%;">
                    <option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                  </select>
                </div>
				
				<div class="form-group">
                        <label>Registered Address</label>
                        <textarea class="form-control" name="address" rows="3" placeholder="Address ..."><?php echo $row['address']; ?></textarea>
                      </div>
				  <div class="form-group">
                    <label for="location">Dist / Location</label>
                    <input  value="<?php echo $row['location']; ?>" type="text" name="location" class="form-control" id="location" placeholder="Dist / Location">
                  </div>
				  <div class="form-group">
                    <label for="district">Country / State</label>
                    <input  value="<?php echo $row['district']; ?>" type="text" name="district" class="form-control" id="district" placeholder="Country / State">
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



</body>
</html>
