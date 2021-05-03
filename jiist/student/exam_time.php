<?php
session_start();
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");
$page = "Onine Exam";
$page1 = "Online Exam";
include "timeout.php";
include "config.php";
if (($_SESSION['user_type'] != "admin") && ($_SESSION['user_type'] != "Student")) header("location: index.php");
$user_id=$_SESSION['user_id'];
$s = "";
$review = false;
if(isset($_GET['id']))
{
  $course_id = $_GET['id'];
}

if(isset($_GET['review']))
{
  $review = true;
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Peritus Academy Online Exam Records</title>
  <!-- Tell the browser to be responsive to screen width -->
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

     <?php include "header.php"; ?>

    <?php include "menu.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
 <br /> 
				 <div class="col-xs-12">
				
		                   <div class="login-panel panel panel-default">


       <div class="box-header">
                     <!-- <button type="button" class="btn btn-info pull-right" style="margin:10px;" id="finish">Finish Exam</button> -->
             <center> <h3>Online Exam</h3> </center>

            </div>
   <div class="box-body">

<?php
$sq = "SELECT * FROM exams WHERE id = '".$course_id."' ";
$re = mysqli_query($conn, $sq);
$r = mysqli_fetch_assoc($re);
$startTime = $r['exam_date_time'];
$duration = $r['total_hours_in_seconds'];
$endTime = date('Y-m-d H:i:s',strtotime($duration.' minutes',strtotime($startTime)));

if(strtotime(date('Y-m-d H:i:s')) > strtotime($endTime)){
  header("location: result.php?id=".$course_id);
}

if($review)
{

$sql = "SELECT questions.*, exams.total_hours_in_seconds, exams.no_of_questions_per_student FROM answers LEFT JOIN questions ON answers.qid = questions.id LEFT JOIN exams ON exams.course_id = questions.course_id WHERE answers.exam_id = '".$course_id."' AND answers.student_id = '".$user_id."' GROUP BY answers.qid ORDER BY answers.qid asc";

} else {
$sql = "SELECT questions.*, exams.total_hours_in_seconds, exams.no_of_questions_per_student FROM exams LEFT JOIN questions ON exams.course_id = questions.course_id WHERE exams.id = '".$course_id."' ORDER BY RAND() LIMIT ".$r['no_of_questions_per_student'];
}
$result = mysqli_query($conn, $sql);
$totalq= mysqli_num_rows($result);
$i = 0;


// echo $sql;
while($row = mysqli_fetch_assoc($result))
{

$i++;
?>

<?php
$sql2 = "SELECT * FROM answers WHERE exam_id = '".$course_id."' AND student_id = '".$user_id."' AND qid = '".$row['id']."' ";
$result2 = mysqli_query($conn, $sql2);
$row3 = mysqli_fetch_assoc($result2);
?>

<div class="row qpad" id="question-<?php echo $i; ?>">
  <div class="col-md-12">
    <div class="question">
      <p><?php echo $i; ?>. <?php echo $row['question']; ?></p>
    </div>
  </div>

    <div class="col-md-6">
      <div class="form-group <?php if($row['correct_option'] == 'option_a' && $review) { echo 'bg-success'; } ?> <?php if($row['correct_option'] != 'option_a' && $row3['myanswer'] == 'option_a' && $review) { echo 'bg-danger'; } ?>">
<label for="<?php echo $i; ?>-option_a" class="control-label required">
  <input type="radio" id="<?php echo $i; ?>-option_a-<?php echo $row['id'];?>" data-correct="<?php echo $row['correct_option']; ?>" name="myanswer<?php echo $i; ?>" value="option_a"
<?php if($review) { echo 'disabled'; } ?>
  >
    <?php echo $row['option_a']; ?>
</label>
      </div>
    </div>


    <div class="col-md-6">
      <div class="form-group <?php if($row['correct_option'] == 'option_b' && $review) { echo 'bg-success'; } ?> <?php if($row['correct_option'] != 'option_b' && $row3['myanswer'] == 'option_b' && $review) { echo 'bg-danger'; } ?>">
<label for="<?php echo $i; ?>-option_b" class="control-label required">
  <input type="radio" id="<?php echo $i; ?>-option_b-<?php echo $row['id'];?>" data-correct="<?php echo $row['correct_option']; ?>"  name="myanswer<?php echo $i; ?>" value="option_b"
  <?php if($review) { echo 'disabled'; } ?>>
    <?php echo $row['option_b']; ?>
</label>
      </div>
    </div>


    <div class="col-md-6">
      <div class="form-group <?php if($row['correct_option'] == 'option_c' && $review) { echo 'bg-success'; } ?> <?php if($row['correct_option'] != 'option_c' && $row3['myanswer'] == 'option_c' && $review) { echo 'bg-danger'; } ?>">
<label for="<?php echo $i; ?>-option_c" class="control-label required">
  <input type="radio" id="<?php echo $i; ?>-option_c-<?php echo $row['id'];?>" data-correct="<?php echo $row['correct_option']; ?>"  name="myanswer<?php echo $i; ?>" value="option_c"
  <?php if($review) { echo 'disabled'; } ?>>
    <?php echo $row['option_c']; ?>
</label>
      </div>
    </div>


    <div class="col-md-6">
      <div class="form-group <?php if($row['correct_option'] == 'option_d' && $review) { echo 'bg-success'; } ?> <?php if($row['correct_option'] != 'option_d' && $row3['myanswer'] == 'option_d' && $review) { echo 'bg-danger'; } ?>">
<label for="<?php echo $i; ?>-option_d" class="control-label required">
  <input type="radio" id="<?php echo $i; ?>-option_d-<?php echo $row['id'];?>" data-correct="<?php echo $row['correct_option']; ?>" name="myanswer<?php echo $i; ?>" value="option_d"
  <?php if($review) { echo 'disabled'; } ?>>
    <?php echo $row['option_d']; ?>
</label>
      </div>
    </div>
    <?php
    if($review)
    {
    ?>
    <div class="col-md-12">
      <p>Correct Answer: <?php echo $row3['original_answer']; ?></p>
      <p>Your Answer: <?php echo $row3['myanswer']; ?></p>
    </div>
    <?php
    }
    ?>

</div>




									<!-- /.box -->
<?php
}
?>

</div>

<div class="clearfix"></div>

<div style="padding: 10px 20px;">
<ul class="pagination pgn">
  <li class="pull-left"><a class="gotoprev" href="#">Previous</a></li>
<?php
$sql = "SELECT questions.*, exams.total_hours_in_seconds, exams.no_of_questions_per_student FROM questions LEFT JOIN exams ON exams.id = questions.course_id WHERE questions.course_id = '".$course_id."' LIMIT ".$r['no_of_questions_per_student'];
$result = mysqli_query($conn, $sql);
$j = 0;
while($row = mysqli_fetch_assoc($result))
{

$j++;
?>
  <!-- <li><a id="page_<?php echo $j; ?>" class="gotopage <?php if($j == 1) { echo 'active'; } ?>" href="#"><?php echo $j; ?></a></li> -->
<?php
}
?>
<li class="pull-right"><a class="gotonext" href="#">Next</a></li>
</ul>
</div>


          
          <!-- /.box -->
        </div>
        <!-- /.col -->
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

  let score = 0;
  let correct = 0;
  let incorrect = 0;

    $('.qpad').each(function(index){
      if(index != 0)
      {
        $(this).hide();
      }

    })



let all = [];

  var exam_id = "<?php echo strtotime($course_id); ?>";
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
  

$('.gotopage').on('click', function(e){
  e.preventDefault();
  let pageid = $(this).attr('id');
  console.log(pageid);
  let arr = pageid.split('_');
  $('#question-'+arr[1]).show().siblings().hide();

})

$('.gotoprev').on('click', function(){
  let pageid = $('.qpad:visible').attr('id');
  let arr = pageid.split('-');
  $('#question-'+arr[1]).prev().show().siblings().hide();

})

$('.gotonext').on('click', function(){
  let pageid = $('.qpad:visible').attr('id');
  let arr = pageid.split('-');
  console.log($('#question-'+arr[1]).next().attr('id'));

  if(typeof $('#question-'+arr[1]).next().attr('id') == 'undefined')
  {
    <?php
    if($review)
    {
    ?>
    alert('No more Questions');
    <?php
    } else {
    ?>
    finish(all);
    <?php
    }
    ?>
  }

  $('#question-'+arr[1]).next().show().siblings().hide();
})

    <?php
    if(!$review)
    {
    ?>
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

    if(myanswer == actanswer)
    {
      isCorrect = true;
    }


  $.ajax({
    type: "POST",
    url: "update_answers.php",
    data: {course_id: <?php echo $course_id; ?>, student_id: <?php echo $user_id; ?>, qid: qid, correct_answer: actanswer, myanswer: myanswer, iscorrect: isCorrect},
    success: function(data){ 
      console.log(data);
     },
  });

    if(all.indexOf(pageid[0]) === -1 && isCorrect)
    {
      all.push(pageid[0]);
    } else if(all.indexOf(pageid[0]) !== -1 && !isCorrect)
    {
      all.splice(all.indexOf(pageid[0]), 1);
    }

  }
});

<?php
}
?>

// $('#finish').on('click', function(){
//   let total = <?php echo $totalq; ?>;
//   let incorrect = parseInt(total) - parseInt(all.length);

//   window.location.replace("finishexam.php?id=<?php echo $course_id; ?>&total="+total+"&correct="+all.length);
// })


  })

function finish(all)
{
  let total = <?php echo $totalq; ?>;
  let incorrect = parseInt(total) - parseInt(all.length);
  console.log(total);
  console.log(all.length);  
  window.location.replace("finishexam.php?id=<?php echo $course_id; ?>&total="+total+"&correct="+all.length);

}
function goBack() {
  window.history.back();
}
</script>
</body>
</html>
