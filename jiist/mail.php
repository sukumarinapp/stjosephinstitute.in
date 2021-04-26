<?php

if(isset($_POST['email'])) {



    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "universekannan@gmail.com";

    $email_subject = "Message From info";





    function died($error) {

        // your error code can go here

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";

        echo "These errors appear below.<br /><br />";

        echo $error."<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        die();

    }



    // validation expected data exists

    if(!isset($_POST['name']) ||

//        !isset($_POST['last_name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['mother_name'])||

     !isset($_POST['nationality']) ||
       !isset($_POST['medium']) ||

        !isset($_POST['blood_group'])||
		     !isset($_POST['gender'])||
			   !isset($_POST['dateof_birth'])||
			 !isset($_POST['employed_unemployed'])||
			   !isset($_POST['physically_handicapped'])||
			   !isset($_POST['phone_number'])||
			   !isset($_POST['course'])||
			  !isset($_POST['discipline'])||
			   !isset($_POST['enrolment_year'])||
			  !isset($_POST['address'])||
			 !isset($_POST['img'])||
			 
			 
 !isset($_POST['religion'])
		) {

        died('We are sorry, but there appears to be a problem with the form you submitted.');

    }



    $first_name = $_POST['name']; // required

   // $last_name = $_POST['last_name']; // required

    $email_from = $_POST['email']; // required

    $mother_name = $_POST['mother_name']; // not required
   $nationality = $_POST['nationality']; // not required
    $medium = $_POST['medium']; // not required
   $religion = $_POST['religion']; // required
 $blood_group = $_POST['blood_group']; // required
 $gender = $_POST['gender']; // required
 $dateof_birth = $_POST['dateof_birth']; // required
 $employed_unemployed = $_POST['employed_unemployed']; // required
 $physically_handicapped = $_POST['physically_handicapped']; // required
 $phone_number = $_POST['phone_number']; // required
 $course = $_POST['course']; // required
 $discipline = $_POST['discipline']; // required
 $enrolment_year = $_POST['enrolment_year']; // required
 $address = $_POST['address']; // required
  $img = $_POST['img']; // required
 
 
 

    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_from)) {

        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$first_name)) {

        $error_message .= 'The First Name you entered does not appear to be valid.<br />';

    }

//    if(!preg_match($string_exp,$last_name)) {
//
//        $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
//
//    }
//    if(!preg_match($string_exp,$last_name)) {
//
//        $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
//    }
//    if(strlen($comments) < 2) {

  //      $error_message .= 'The Comments you entered do not appear to be valid.<br />';

//    }

    if(strlen($error_message) > 0) {

        died($error_message);

    }

    $email_message = "Form details below.\n\n";



    function clean_string($string) {

        $bad = array("content-type","bcc:","to:","cc:","href");

        return str_replace($bad,"",$string);

    }



    $email_message .= "First Name: ".clean_string($first_name)."\n";

  //  $email_message .= "Last Name: ".clean_string($last_name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Mother name: ".clean_string($mother_name)."\n";

   $email_message .= "Need: ".clean_string($nationality)."\n";
    $email_message .= "medium: ".clean_string($medium)."\n";

   $email_message .= "religion: ".clean_string($religion)."\n";
  $email_message .= "blood group: ".clean_string($blood_group)."\n";
  $email_message .= "gender: ".clean_string($gender)."\n";
  $email_message .= "date of birth: ".clean_string($dateof_birth)."\n";
  $email_message .= "employed_unemployed: ".clean_string($employed_unemployed)."\n";
  $email_message .= "physically_handicapped: ".clean_string($physically_handicapped)."\n";
  $email_message .= "phone_number: ".clean_string($phone_number)."\n";
  $email_message .= "course: ".clean_string($course)."\n";
   $email_message .= "discipline: ".clean_string($discipline)."\n";
  $email_message .= "enrolment_year: ".clean_string($enrolment_year)."\n";
  $email_message .= "address: ".clean_string($address)."\n";
  $email_message .= "img: ".clean_string($img)."\n";
  




// create email headers

    $headers = 'From: '.$email_from."\r\n".

        'Reply-To: '.$email_from."\r\n" .

        'X-Mailer: PHP/' . phpversion();

    @mail($email_to, $email_subject, $email_message,  $headers);

    ?>



    <!-- include your own success html here -->



    Thank you for contacting us. We will be in touch with you very soon.



    <?php

}

?>