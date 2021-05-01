  <div class="sidebar" data-color="purple" data-background-color="white" data-image="assetss/img/sidebar-1.jpg">

      <div class="logo"><a href="user.php" class="simple-text logo-normal">
          <img src="../admin/uploads/<?php echo $_SESSION['photo']; ?>?<?php echo rand(); ?>" style="width: 20%"><br><?php echo $full_name; ?>
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
           <li class="nav-item <?php if($page=="Dashboard") echo "active"; ?>  ">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li><hr class="hrr">
           <li class="nav-item <?php if($page=="Student Profile") echo "active"; ?>  ">
            <a class="nav-link" href="user.php">
              <i class="material-icons">account_circle</i>
              <p>Student Profile</p>
            </a>
          </li><hr class="hrr">
                <li class="nav-item <?php if($page=="Subject") echo "active"; ?>  ">

            <a class="nav-link" href="subject.php">
              <i class="material-icons">subject</i>
              <p>Subject</p>
            </a>
          </li><hr class="hrr">
           <li class="nav-item <?php if($page=="Virtual Library") echo "active"; ?>  ">
            <a class="nav-link" href="library.php">
              <i class="material-icons">class</i>
              <p>Virtual Library</p>
            </a>
          </li><hr class="hrr">
           <li class="nav-item <?php if($page=="Virtual Class") echo "active"; ?>  ">
            <a class="nav-link" href="class.php">
              <i class="material-icons">developer_board</i>
              <p>Virtual Class</p>
            </a>
            </li><hr class="hrr">
           <li class="nav-item <?php if($page=="Online Exam") echo "active"; ?>  ">
            <a class="nav-link" href="onlineexam.php">
              <i class="material-icons">developer_board</i>
              <p>Online Exam</p>
            </a>
            </li><hr class="hrr">
           <li class="nav-item <?php if($page=="Virtual Laborartory") echo "active"; ?>  ">
            <a class="nav-link" href="lab.php">
              <i class="material-icons">developer_board</i>
              <p>Virtual Laborartory</p>
            </a>
            </li><hr class="hrr">
           <li class="nav-item <?php if($page=="Assignment") echo "active"; ?>  ">
            <a class="nav-link" href="assignment.php">
              <i class="material-icons">assignment</i>
              <p>Assignment</p>
            </a>
          </li><hr class="hrr">
           <li class="nav-item <?php if($page=="Project") echo "active"; ?>  ">
            <a class="nav-link" href="project.php">
              <i class="material-icons">build_circle</i>
              <p>Project</p>
            </a>
          </li><hr class="hrr">
           <!-- <li class="nav-item <?php if($page=="Virtual Laboratory") echo "active"; ?>  ">
            <a class="nav-link" href="lab.php">
              <i class="material-icons">science</i>
              <p>Virtual Laboratory</p>
            </a>
          </li><hr class="hrr">
           <li class="nav-item <?php if($page=="Live IIT") echo "active"; ?>  ">
            <a class="nav-link" href="live.php">
              <i class="material-icons">live_tv</i>
              <p>Live IIT</p>
            </a> -->
          
          </li><hr class="hrr">
           <li class="nav-item <?php if($page=="Time Table") echo "active"; ?>  ">
            <a class="nav-link" href="timetable.php">
              <i class="material-icons">table_chart</i>
              <p>Time Table</p>
            </a>
          </li><hr class="hrr">
         
        </ul>
      </div>
    </div>