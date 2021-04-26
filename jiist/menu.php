<div id="wrapper" class="container">
	<section class="navbar main-menu">
	  <div class="navbar-inner main-menu">
	  	<nav id="menu" class="pull-left">
		  	<ul class="nav navbar-nav">
            <li class ="dropdown <?php if($page=="Home") echo "active"; ?>"><a href="index.php">Home</a></li> 
            <li class ="dropdown <?php if($page=="About Us") echo "active"; ?>"><a href="about-us.php">About Us</a></li> 
            <li class ="dropdown <?php if($page=="Accreditation") echo "active"; ?>"><a href="">Accreditation</a></li> 
            
            <li  class="dropdown <?php if($page=="Programs") echo "active"; ?>"><a href="javascript:void(0)">Programs<i class="fa fa-angle-down"></i></a>
    		   <ul class="dropdown-menu">
<li><a href="sslc.php">Open Schooling</a></li>
<li><a href="program.php?id=2">Skill Development</a></li>
<li><a href="program.php?id=3">Vocational Training</a></li>
<li><a href="program.php?id=4">Science And Humanities</a></li>
<li><a href="program.php?id=1">Engineering</a></li>
<li><a href="program.php?id=5">Medical</a></li>
<li><a href="program.php?id=6">Management</a></li>
<li><a href="program.php?id=7">Education</a></li>
<li><a href="program.php?id=8">Research</a></li>
</ul>
    		  </li>
          <li  class="dropdown <?php if($page=="Find And Apply") echo "active"; ?>"><a href="javascript:void(0)">Admission<i class="fa fa-angle-down"></i></a>
    		      <ul class="dropdown-menu">  
			<li><a href="online-affiliation-center.php">Online Affiliation</a></li>

                <li><a href="admission-procedure-and-fees.php">Fees And Procedure</a></li>
                <li><a href="find-admission-centers.php"> Admission Centers </a></li>
              </ul>
    		  </li>
          <li  class="dropdown <?php if($page=="Downloads") echo "active"; ?>"><a href="javascript:void(0)">Downloads<i class="fa fa-angle-down"></i></a>
    		      <ul class="dropdown-menu">
                <li><a href="assets/data/jiist-application-form.pdf">Application Form</a></li>
                <li><a href="assets/data/jiist-franchise-agreement.pdf">Franchise Form</a></li>
                <li><a href="assets/data/jiist-brochure.pdf">Prospects</a></li>
              </ul>
    	  </li>
          <li  class="dropdown <?php if($page=="Verification") echo "active"; ?>"><a href="javascript:void(0)">Verification<i class="fa fa-angle-down"></i></a>
    		      <ul class="dropdown-menu">  
                <li><a href="certificate-verification.php">Certificate Verification</a></li>
              </ul>
    		  </li>
          <li class ="dropdown <?php if($page=="Contact Us") echo "active"; ?>"><a href="contact-us.php">Contact Us</a></li> 
          <li  class="dropdown <?php if($page=="Users Login") echo "active"; ?>"><a href="javascript:void(0)">Users Login<i class="fa fa-angle-down"></i></a>
    		      <ul class="dropdown-menu">  
                <li><a href="centers-login.php">Centers Login</a></li>
                <li><a href="login.php">Studens Login</a></li>
              </ul>
    	  </li>
    	  <li style ="padding: 7px 10px;">
		  <form method="post" action="page.php" enctype="multipart/form-data">
		  
                        <input class="form-control padding: 10px 14px;" name="paper_name" placeholder="Search"><button type="submit" name="submit"> Search</button>
                    </form>
					</li>
        </ul>
    	</nav>
	  </div>
</section>
