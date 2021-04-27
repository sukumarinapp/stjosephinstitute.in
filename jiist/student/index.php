<?php
session_start();
$page = "Dashboard";
include "../admin/timeout.php";
include "../admin/config.php";
$user_id=$_SESSION['user_id'];                           
$full_name=$_SESSION['full_name'];  
$course_id=$_SESSION['course_id'];
$today=date("Y-m-d")                                                  
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
  <style>
    .sidebar .nav {
      margin-top: 0px!important;
    }
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
            <div class="col-lg-6 col-md-6">
              <div class="card">
                <table class="table table-hover">
                    <thead class="text-warning" style="font-weight: bold !important">
                      <tr><th align="center" colspan="5" style="font-weight:bold;background: steelblue;color: white;">Assignment</th></tr>
                      <tr style="font-weight:bold;background: darkgreen;color: white;">
                      <th>S.No</th>
                      <th>Assignment Title</th>
                      <th>Semester</th>
                      <th>Last Date</th>
                    </tr>
                    </thead>
                    <tbody>
<?php
$sql = "select a.*,b.years,b.semester_list from jiier_assignment a,jiier_semester b where a.semester_id=b.id order by years,semester_list";
                      $result = mysqli_query($conn, $sql);
                      $i=0;
                      while ($row = mysqli_fetch_assoc($result)) {
                        $i++;
                        $last_date=$row['last_date'];
                        $ldate=explode("-", $last_date);
                        $last_date=$ldate[2]."-".$ldate[1]."-".$ldate[0];
                      ?>
                      <tr style="font-weight:bold;">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['semester_list']; ?></td>
                        <td><?php echo $last_date; ?></td>
                        
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>                      
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class="card">
                <table class="table table-hover">
                    <thead class="text-warning" style="font-weight: bold !important">
                      <tr><th colspan="5" style="font-weight:bold;background: steelblue;color: white;">Timetable</th></tr>
                      <tr style="font-weight:bold;background: darkgreen;color: white;"><th>S.No</th>
                      <th>Subject Code</th><th>Subject Name</th><th>Exam Date</th><th>Session</th>
                    </tr>
                    </thead>
                    <tbody>
<?php
$sql = "select a.*,b.id,c.semester_id,c.subject_code,c.subject_name from jiier_timetable a,jiier_semester b,jiier_subject c where c.semester_id=b.id and a.subject_id=c.id and a.course_id=$course_id and a.exam_date>='$today' order by b.id,c.id";
$result = mysqli_query($conn, $sql);
                      $result = mysqli_query($conn, $sql);
                      $i=0;
                      while ($row = mysqli_fetch_assoc($result)) {
                        $i++;
                        $exam_date = explode("-",$row['exam_date']);
$exam_date=$exam_date[2]."-".$exam_date[1]."-".$exam_date[0];
                      ?>
                      <tr style="font-weight:bold;">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['subject_code']; ?></td><td><?php echo $row['subject_name']; ?></td><td><?php echo $exam_date; ?></td>
<td><?php echo $row['exam_session']; ?></td>
                        
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>                      
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
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assetss/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assetss/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assetss/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
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

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

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