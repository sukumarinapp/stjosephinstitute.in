 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
   <!--   <img src="uploads/logo/sjei-logo.jpg" alt="JIIST Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">-->
      <span class="brand-text font-weight-light">JIIST</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
		  <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?php if($page=="Dashboard") echo "active"; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
		   
           <li class="nav-item has-treeview  <?php if($page=="Student") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Student") echo "active"; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Student
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-student.php" class="nav-link <?php if($page1=="Add Student") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Student</p>
                </a>
              </li>
              <li class="nav-item">
			    <a href="students.php" class="nav-link <?php if($page1=="View Student") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Student</p>
                </a>
              </li>
            </ul>
          </li>
          <?php if($_SESSION['user_type']=="Superadmin"){ ?>
         <li class="nav-item has-treeview  <?php if($page=="Course") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Course") echo "active"; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Course
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-course.php" class="nav-link <?php if($page1=="Add Course") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Course</p>
                </a>
              </li>
              <li class="nav-item">
          <a href="course.php" class="nav-link <?php if($page1=="View Course") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Course</p>
                </a>
              </li>
            </ul>
          </li>          
          
          <li class="nav-item has-treeview  <?php if($page=="Subject") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Subject") echo "active"; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Subject
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-subject.php" class="nav-link <?php if($page1=="Add Subject") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subject</p>
                </a>
              </li>
              <li class="nav-item">
          <a href="subject.php" class="nav-link <?php if($page1=="View Subject") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Subject</p>
                </a>
              </li>
           
          <li class="nav-item">
          <a href="add-assignment.php" class="nav-link <?php if($page1=="Add Assignment") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Assignment</p>
                </a>
              </li>
           
          <li class="nav-item">
          <a href="assignment.php" class="nav-link <?php if($page1=="View Assignment") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Assignment</p>
                </a>
              </li>
            </ul>
          </li>   
          <li class="nav-item has-treeview  <?php if($page=="Project") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Project") echo "active"; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Project
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-project.php" class="nav-link <?php if($page1=="Add Project") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Project</p>
                </a>
              </li>
              <li class="nav-item">
          <a href="project.php" class="nav-link <?php if($page1=="View Project") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Project</p>
                </a>
              </li>
            </ul>
          </li>  

          <li class="nav-item has-treeview  <?php if($page=="Timetable") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Timetable") echo "active"; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Timetable
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-timetable.php" class="nav-link <?php if($page1=="Add Timetable") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Timetable</p>
                </a>
              </li>
              <li class="nav-item">
          <a href="timetable.php" class="nav-link <?php if($page1=="View Timetable") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Timetable</p>
                </a>
              </li>
            </ul>
          </li>  
   
          <li class="nav-item">
            <a href="lab.php" class="nav-link <?php if($page=="Lab") echo "active"; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Virtual Laboratory
              </p>
            </a>
          </li>    
          
		  <!-- <li class="nav-item has-treeview  <?php if($page=="Follow") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Follow") echo "active"; ?>">
              <i class="nav-icon fas fa-arrow-up"></i>
              <p>
               Manage Follow
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="student-follow.php" class="nav-link <?php if($page1=="Student Follow") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Follow</p>
                </a>
              </li>
			  <?php if($_SESSION['user_type']=="Superadmin"){ ?>
			 <li class="nav-item">
                <a href="staff-follow.php" class="nav-link <?php if($page1=="Staf Follow") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Centers Follow</p>
                </a>
              </li>
			<?php } ?>  
              <li class="nav-item">
			    <a href="today-follow.php" class="nav-link <?php if($page1=="Today Follow") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
				  <?php if($_SESSION['user_type']=="Superadmin"){ ?>

                  <p>Today Follow</p>
				  <?php } if($_SESSION['user_type']=="Admin"){ ?>

                  <p>Student Follow</p>
		        	<?php } ?>  
                </a>
              </li>
            </ul>
          </li> -->
		   <li class="nav-item has-treeview  <?php if($page=="SMS") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="SMS") echo "active"; ?>">
              <i class="nav-icon fas fa-sms fa-2x"></i>
              <p>
               Manage SMS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="student-sms.php" class="nav-link <?php if($page1=="Student SMS") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student SMS</p>
                </a>
              </li>
				  <?php if($_SESSION['user_type']=="Superadmin"){ ?>
              <li class="nav-item">
			    <a href="centre-sms.php" class="nav-link <?php if($page1=="Admin SMS") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin SMS</p>
                </a>
              </li>
			 
            </ul>
          </li>
           <?php } ?>  
	    <?php if($_SESSION['user_type']=="Superadmin"){ ?>
		  <!-- <li class="nav-item has-treeview  <?php if($page=="Centers") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Centers") echo "active"; ?>">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
               Manage Centers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
			    <a href="view-centers.php" class="nav-link <?php if($page1=="View Center") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Center</p>
                </a>
              </li>
            </ul>
          </li> -->
		<!--  <li class="nav-item has-treeview  <?php if($page=="Country") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Country") echo "active"; ?>">
              <i class="nav-icon fas fa-universal-access"></i>
              <p>
               Manage Country
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-country.php" class="nav-link <?php if($page1=="Add Country") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Country</p>
                </a>
              </li>
              <li class="nav-item">
			    <a href="view-country.php" class="nav-link <?php if($page1=="View Country") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Country</p>
                </a>
              </li>
            </ul>
          </li>-->
		   <!-- <li class="nav-item has-treeview  <?php if($page=="Manage Interview") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Manage Interview") echo "active"; ?>">
              <i class="nav-icon fas fa-universal-access"></i>
              <p>
               Manage Interview
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-country.php" class="nav-link <?php if($page1=="Stat Interview") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stat Interview</p>
                </a>
              </li>
              <li class="nav-item">
			    <a href="view-country.php" class="nav-link <?php if($page1=="States Interview") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>States Interview</p>
                </a>
              </li>
            </ul>
          </li> 
           <?php } ?>  --> 
           <?php } ?>
           <?php if($_SESSION['user_type']=="Superadmin"){ ?>
		  <li class="nav-item has-treeview  <?php if($page=="Users") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Users") echo "active"; ?>">
              <i class="nav-icon fas fa-user-secret"></i>
              <p>
                Manage Center
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-user.php" class="nav-link <?php if($page1=="Add User") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Center</p>
                </a>
              </li>
              <li class="nav-item">
			    <a href="users.php" class="nav-link <?php if($page1=="View Users") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Center</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
          <li class="nav-item has-treeview  <?php if($page=="Profile") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Profile") echo "active"; ?>">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                <?php echo $_SESSION['full_name']; ?>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="password.php" class="nav-link <?php if($page1=="Change Password") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="https://remotedesktop.google.com/support/" target="_blank" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Screen Share</p>
                </a>
              </li>
              <li class="nav-item">
			    <a href="logout.php" class="nav-link <?php if($page1=="Logout") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>