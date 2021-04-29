<?php
session_start();
$page = "Hall Ticket";
$page1 = "View Subject";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "Superadmin") && ($_SESSION['user_type'] != "Admin")) header("location: index.php");
$student_id=$_GET['id'];
$user_id=$_SESSION['user_id'];
if (isset($_POST['submit'])) {
  $upddat=date("Y-m-d");
  $stmt = $conn->prepare("INSERT INTO jiier_ticket (student_id,upddat) VALUES (?,?)");
  $stmt->bind_param("ss", $student_id,$upddat);
  $stmt->execute() or die ($stmt->error);
  $id=$stmt->insert_id;
  $file_name = $_FILES['ticket']['name'];
  if (trim($file_name) != "") {
      $ext = pathinfo($file_name, PATHINFO_EXTENSION);
      $file_name = $id . "." . $ext;
      $query = "update jiier_ticket set ticket = '" . $file_name . "' where id=$id";
      mysqli_query($conn, $query);
      $target_path = "ticket/";
      $target_path = $target_path . $file_name;
      move_uploaded_file($_FILES['ticket']['tmp_name'], $target_path);
  }
header("location: ticket.php?id=".$student_id);
}
$sql2 = "select * from jiier_ticket where student_id=$student_id";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Hall Ticket</title>

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
            <h1>Add Hall Ticket</h1>
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
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <form method="post" action="" enctype="multipart/form-data">
          
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                

                <div class="form-group">
                    <label for="library">Upload Hall Ticket</label>
                    <input accept="image/x-png,image/gif,image/jpeg,application/pdf" type="file" class="form-control" id="ticket" name="ticket" />
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
      <tr><th>View hall ticket</th><th>Delete hall ticket</th></tr>
      </thead>
      <tbody>
<?php
$sql3 = "select * from jiier_ticket where student_id=$student_id order by upddat desc";
$result3 = mysqli_query($conn, $sql3);
while($row3 = mysqli_fetch_assoc($result3)){
?>
      <tr><td><a target="_blank" href="ticket/<?php echo $row3['ticket']; ?>">View</a></td><td><a href="delete-ticket.php?id=<?php echo $row3['id']; ?>&student_id=<?php echo $student_id; ?>">Delete</a></td></tr>
      
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
  function add_lesson() {
    var container = document.getElementById('videoDiv');
    input=document.createElement("br");
    container.appendChild(input);
    input=document.createElement("br");
    container.appendChild(input);
    input = document.createElement('input');
    input.type="text";
    input.name="lesson[]";
    input.size="80";
    input.maxlength="100";
    container.appendChild(input);
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
