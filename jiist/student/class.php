<?php
session_start();
$page = "Virtual Class";
include "../admin/timeout.php";
include "../admin/config.php";
$user_id=$_SESSION['user_id'];                           
$full_name=$_SESSION['full_name'];  
$course_id=$_SESSION['course_id'];                         
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assetss/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assetss/img/jiist-fav.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ST.Joseph Institute
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
</head>

<body class="">
  <div class="wrapper ">
  <?php include "menu.php"; ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include "topnav.php"; ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">




  <?php
          $sql = "select id,semester_list from jiier_semester order by id";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                          $sem_id=$row['id'];
$sql2 = "select * from jiier_subject where  course_id=$course_id and semester_id=$sem_id";
$result2 = mysqli_query($conn, $sql2);
$sub_count= mysqli_num_rows($result2);
                            ?>

            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="card card-stats" style="box-shadow: 0 1px 4px 0 rgb(0 0 0 / 35%)!important">
                <div class="card-header card-header-warning card-header-icon">
                  <div style="width: -webkit-fill-available; margin-right: unset" class="card-icon " >
                   <h1 style="font-weight:bold;margin-bottom:5px;z-index:-9999;text-align: center;color: white;<?php if($sub_count>0) echo " background-color:darkgreen !important" ?>" class="card-category " ><a style="color:white;font-weight:bold" href="#" onclick="show_subject(<?php echo $row['id']; ?>)"><?php echo $row['semester_list']; ?></a></h1 >
                   
                  </div>
                </div>
              </div>
            </div>
<?php } ?>
</div>
<?php
$sql2 = "select a.*,b.id from jiier_subject a,jiier_semester b where a.semester_id=b.id and course_id=$course_id order by b.id";
$result2 = mysqli_query($conn, $sql2);
$sub_count=mysqli_num_rows($result);
$semester=0;
$i=0;
while ($row2 = mysqli_fetch_assoc($result2)) {
$sub_count=mysqli_num_rows($result2);

if($semester!=$row2['semester_id']){
  $i=0;
?>
<?php
if($semester!=$row2['semester_id']  && $i==0){
?>
</tbody>
</table>
<?php
}
?>
<table style="display: none" class="table table-bordered" id="<?php echo $row2['semester_id']; ?>" >
<thead>
<tr style="background-color: darkgreen;color:white;font-weight: bold"><th>Subject Code</th><th>Subject Name</th><th>View Video</th></tr>
</thead>
<tbody>
<?php
$i++;
}


?>

<tr style="background-color: white;color:black;font-weight: bold"><td><?php echo $row2['subject_code']; ?></td><td><?php echo $row2['subject_name']; ?></td>
<td style="font-weight:bold;text-align: left;" ><a href="#" onclick="showbook(event,<?php echo $row2['id']; ?>)"><i class="material-icons">play_circle_filled</i></a></td></tr>

<?php
$semester=$row2['semester_id'];
}
?>

<?php
if($sub_count>0){
?>
</tbody>
</table>
<?php
}
?>      
                
              </div>                  
                </div>
              </div>
                <div class="card-footer" style="margin-top: unset!important;">
                  <div class="stats">
                    
                    <a href="http://www.stjosephinstitute.in/"></a>
                  </div>
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
  
  <!--   Core JS Files   -->
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
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assetss/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assetss/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assetss/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assetss/demo/demo.js"></script>
  <script>
    function show_subject(id){
      $(".table").hide();
      $("#"+id).show();
    }
    function showbook(ev,subject_id){
      ev.preventDefault();
      window.location.href="video.php?id="+subject_id;
    }
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').php();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

       

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assetss/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>