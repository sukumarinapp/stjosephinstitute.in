<?php
$page = "Find And Apply";
include "admin/config.php";
error_reporting(1);
set_time_limit(0);
include "mailer/PHPMailerAutoload.php";
	
if(isset($_POST['submit'])){
	//echo "<pre>";
	//print_r($_FILES);
	//print_r($_POST);
	//echo "</pre>";
	//die;
	
    $tag = "";
    $tag .= 'Name : ' . $_POST['fname'] . '<br>';
    $tag .= 'email : ' . $_POST['email'] . '<br>';
    $tag .= 'phone : ' . $_POST['phone'] . '<br>';
    $tag .= 'address : ' . $_POST['address'] . '<br>';
    $tag .= 'city : ' . $_POST['city'] . '<br>';
    $tag .= 'state : ' . $_POST['state'] . '<br>';
    $tag .= 'about : ' . $_POST['about'] . '<br>';
	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->Username = "sukumar.inapp2@gmail.com";
	$mail->Password = "rails2020";
	$mail->SetFrom("sukumar.inapp2@gmail.com");
	$mail->Subject = "NPS Online Apply";
	$mail->MsgHTML($tag);
	if(isset($_FILES["resume"])){
        for ($i = 0; $i < count($_FILES["resume"]['name']); $i++) {
            $mail->AddAttachment($_FILES['resume']['tmp_name'][$i],$_FILES['resume']['name'][$i]);
        }        
    }

	$mail->AddAddress("universekannan@gmail.com");
	if (!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message has been sent";
	}
	}

?>



<div class="section-space">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8 section-title">
          <h1>Let's Get Started</h1>
         </div>
      </div>
      <div class="row">
        <form class="franchising-form" method="post" action="">
            
          <div class="col-md-4"> 
            <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="fname">Name</label>
              <input id="fname" name="fname" type="text" placeholder="Name" class="form-control input-md" required>
            </div>
          </div>
          <!-- Text input-->
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label" for="email">E-mail</label>
              <input id="email" name="email" type="text" placeholder="email" class="form-control input-md" required>
            </div>
          </div>
          
          <!-- Text input-->
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label" for="phone">Phone</label>
              <input id="phone" name="phone" type="text" placeholder="phone" class="form-control input-md" required>
            </div>
          </div>
          <div class="col-md-4"><!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="address">Bussiness Reason</label>
              <input id="address" name="address" type="text" placeholder="address" class="form-control input-md">
            </div>
          </div>
            <div class="col-md-4"><!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="city">City</label>
              <input id="city" name="city" type="text" placeholder="City" class="form-control input-md">
            </div>
          </div>
            <div class="col-md-4"><!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="state">State</label>
              <input id="state" name="state" type="text" placeholder="state" class="form-control input-md">
            </div>
          </div>
          
          

          
          <!-- Textarea -->
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label" for="about">Tell us A Little About Yourself:</label>
              <textarea class="form-control" id="about" name="about" rows="5"></textarea>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" name="submit" class="btn btn-default"  id="myBtn">Submit Request</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  
   <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Your Mail Sent Successfully</h2>
    </div>
   
  </div>

</div>


<style>
table {
    max-width:980px;
    table-layout:fixed;
    margin:auto;
}
th, td {
    padding:5px 10px;
    border:0px solid #000;
}
thead, tfoot {
    background:#f9f9f9;
    display:table;
    width:100%;
    width:calc(100 - 18px);
}
tbody {
    height:100px;
    overflow:auto;
    overflow-x:hidden;
    display:block;
    width:100%;
}
tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;
}
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 150px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
   /* background-color: #fefefe;*/
    margin: auto;
    /*padding: 80;*/
    border: 1px solid #888;
    width: 40%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
	
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 5px 10px;
    background-color:#90bb92;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 5px 10px;
    background-color: red;
    color: white;
}
</style>

 <script>
  
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>