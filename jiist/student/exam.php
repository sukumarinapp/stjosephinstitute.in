<?php
session_start();
$page = "Online Exam";
include "timeout.php";
include "../admin/config.php";
$id=$_GET['id'];
$full_name=$_SESSION['full_name'];  
$course_id=$_SESSION['course_id'];  
$user_id=$_SESSION['user_id'];  

$sql = "SELECT * FROM jiier_timetable where id = '".$id."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$startTime = $row['exam_date'];
$duration = $row['total_hours_in_minutes'];
$endTime = date('Y-m-d H:i:s',strtotime($duration.' minutes',strtotime($startTime)));
$current_time = strtotime(date('Y-m-d H:i:s'));;
$begin_time = strtotime($startTime);
$end_time = strtotime($endTime);
$subject_id = $row['subject_id'];
$no_of_questions = $row['no_of_questions_per_student'];
if($current_time>=$begin_time && $current_time<=$end_time){ 
}else{
  header("location: onlineexam.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assetss/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assetss/img/jiist-fav.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Online Exam
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assetss/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assetss/demo/demo.css" rel="stylesheet" />
  <style type="text/css">
.sidebar .nav {
      margin-top: 0px!important;
    }
    .dropdown-menu.show {
    display: inline-table;}
     
 
    .btnz{
    background-color: #9229ac;
    text-align: center;
    color: white;
    border-radius: 8px;
    padding: 7px;
}
.hrr{
  margin-top: 0px !important;
  margin-bottom: 0px !important;
}
  </style>
  <style type="text/css">
  .bg-success {
    background:green;
    color:white;
  }
  .bg-danger {
    background:red;
    color:white;
  }
  .qpad {
    padding:10px;
  }
.question {
  background:#EEE;
  padding:10px;
  border:1px solid #DDD;
  font-size:18px;
  margin-top:10px;
  margin-bottom:10px;
}

.qpad div[class="col-md-6"] {
  padding:10px 25px;
}
.pgn {
  width:100%;
}
.pgn li a {
  background:#3287a8;
  color:#ffffff;
}

.qpad .form-group {
  padding:5px;
}
</style>
</head>
<body class="">
<div class="wrapper ">
<?php include "menu.php"; ?>
<div class="main-panel">
<?php include "topnav.php"; ?>
<div class="content">
<div class="container-fluid">
<div class="card">
<div class="card-header card-header-warning">
<h4 style="font-weight: bold" class="card-title">Online Exam</h4>
</div>
<div class="card-body table-responsive">
<?php
$sql5 = "select * from jiier_results where exam_id=$id and student_id=$user_id";
$result5 = mysqli_query($conn, $sql5);
if(mysqli_num_rows($result5)==0){

$sql = "select * from jiier_questions where subject_id=$subject_id ORDER BY RAND() LIMIT $no_of_questions";
$result = mysqli_query($conn, $sql);
$totalq= mysqli_num_rows($result);
$i = 0;
while($row = mysqli_fetch_assoc($result)){
$i++;
?>
<div class="row qpad" id="question-<?php echo $i; ?>">
  <div class="col-md-12">
    <div class="question">
      <p><?php echo $i; ?>. <?php echo $row['question']; ?></p>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="<?php echo $i; ?>-option_a" class="control-label required">
        <input type="radio" id="<?php echo $i; ?>-option_a-<?php echo $row['id'];?>" data-correct="<?php echo $row['correct_option']; ?>" name="myanswer<?php echo $i; ?>" value="option_a">
          <?php echo $row['option_a']; ?>
      </label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="<?php echo $i; ?>-option_b" class="control-label required">
        <input type="radio" id="<?php echo $i; ?>-option_b-<?php echo $row['id'];?>" data-correct="<?php echo $row['correct_option']; ?>" name="myanswer<?php echo $i; ?>" value="option_b">
          <?php echo $row['option_b']; ?>
      </label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="<?php echo $i; ?>-option_c" class="control-label required">
        <input type="radio" id="<?php echo $i; ?>-option_c-<?php echo $row['id'];?>" data-correct="<?php echo $row['correct_option']; ?>" name="myanswer<?php echo $i; ?>" value="option_c">
          <?php echo $row['option_c']; ?>
      </label>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="<?php echo $i; ?>-option_d" class="control-label required">
        <input type="radio" id="<?php echo $i; ?>-option_d-<?php echo $row['id'];?>" data-correct="<?php echo $row['correct_option']; ?>" name="myanswer<?php echo $i; ?>" value="option_d">
          <?php echo $row['option_d']; ?>
      </label>
    </div>
  </div>
</div>
<?php
}
}
?>
<div class="clearfix"></div>

<div style="padding: 10px 20px;">
    <a class="btn btn-info gotoprev" href="#">Previous</a>
    <a class="btn btn-info gotonext pull-right" href="#">Next</a>
</div>

</div>
</div>
</div> 
</div>
</div>
<footer class="footer">
<div class="container-fluid">
<nav class="float-left">
<ul>
<li>
<a href="http://www.stjosephinstitute.in/jiist/">
Home
</a>
</li>

<li>
<a href="http://www.stjosephinstitute.in/jiist/about-us.php">
About Us
</a>
</li>
<li>
<a href="http://www.stjosephinstitute.in/jiist/contact-us.php">
Contact Us
</a>
</li>
</ul>
</nav>
<div class="copyright float-right">
&copy;
<script>
document.write(new Date().getFullYear())
</script>, made with <i class="material-icons">favorite</i> by
<a href="https://galaxytechnologypark.com/" target="_blank">Galaxy Technology Park</a> for a better web.
</div>
</div>
</footer>
</div>
</div>
<script src="assetss/js/core/jquery.min.js"></script>
<script src="assetss/js/core/popper.min.js"></script>
<script src="assetss/js/core/bootstrap-material-design.min.js"></script>
<script src="assetss/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="assetss/js/plugins/moment.min.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="assetss/js/plugins/sweetalert2.js"></script>
<!-- Forms Validations Plugin -->
<script src="assetss/js/plugins/jquery.validate.min.js"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="assetss/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="assetss/js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="assetss/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="assetss/js/plugins/jquery.dataTables.min.js"></script>
<!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="assetss/js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assetss/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="assetss/js/plugins/fullcalendar.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="assetss/js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assetss/js/plugins/nouislider.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="assetss/js/plugins/arrive.min.js"></script>

<script src="assetss/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assetss/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assetss/demo/demo.js"></script>
<script>
  $(document).ready(function() {
    let score = 0;
    let correct = 0;
    let incorrect = 0;

    $('.qpad').each(function(index){
      if(index != 0){
        $(this).hide();
      }
    });

    let all = [];

    var endTime = "<?php echo strtotime($endTime); ?>"; 
    var repeater;
    function doWork() {
      var currentTime = Date.now()/1000;
      console.log("<?php echo $endTime; ?>");
      console.log("Current Time: "+currentTime);
      if(currentTime > endTime){
        alert("Exam Completed");
        finish(all);
      }
      repeater = setTimeout(doWork, 5000);
    }
    doWork();

    $('.gotoprev').on('click', function(){
      let pageid = $('.qpad:visible').attr('id');
      let arr = pageid.split('-');
      if(typeof $('#question-'+arr[1]).prev().attr('id') == 'undefined'){
      }else{
        $('#question-'+arr[1]).hide();
        $('#question-'+arr[1]).prev().show();
      }
    });

    $('.gotonext').on('click', function(){
      let pageid = $('.qpad:visible').attr('id');
      let arr = pageid.split('-');
      if(typeof $('#question-'+arr[1]).next().attr('id') == 'undefined'){
        finish(all);
      }else{
        $('#question-'+arr[1]).hide();
        $('#question-'+arr[1]).next().show();
      }
    });

    $("input").on( "click", function() {
      let isCorrect = false;
      if($(this).prop('checked', true))
      {
        let myanswer = $(this).val();
        let actanswer = $(this).attr('data-correct');
        let page = $(this).attr('id');
        let pageid = page.split('-');
        let qid = pageid[2];
        console.log(myanswer);
        if(myanswer == actanswer){
          isCorrect = true;
        }
        $.ajax({
          type: "POST",
          url: "update_answers.php",
          data: {exam_id: <?php echo $id; ?>, student_id: <?php echo $user_id; ?>, qid: qid, correct_answer: actanswer, myanswer: myanswer, iscorrect: isCorrect},
          success: function(data){ 
            console.log(data);
           },
        });
        if(all.indexOf(pageid[0]) === -1 && isCorrect){
            all.push(pageid[0]);
        }else if(all.indexOf(pageid[0]) !== -1 && !isCorrect){
          all.splice(all.indexOf(pageid[0]), 1);
        }
      }
    });
 });

  function finish(all){
    let total = <?php echo $totalq; ?>;
    let incorrect = parseInt(total) - parseInt(all.length);
    console.log(total);
    console.log(all.length);  
    window.location.replace("finishexam.php?exam_id=<?php echo $id; ?>&total="+total+"&correct="+all.length);
  }

</script>
</body>
</html>