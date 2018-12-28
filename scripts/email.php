<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $from = 'From:".$email;
    $to = 'hpolk68@gmail.com'; 
    $subject = 'Customer Input';

    $body = "From: $fname\n $lname\n E-Mail: $email\n Message:\n $message";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fname"])) {
          $fnameErr = "Name is required";
        } else {
          $fname = test_input($_POST["fname"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
            $fnameErr = "Only letters and white space allowed";
          }
        }

        if (empty($_POST["lname"])) {
            $lnameErr = "Name is required";
          } else {
            $lname = test_input($_POST["lname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
              $lnameErr = "Only letters and white space allowed";
            }
          }
      
        if (empty($_POST["email"])) {
          $emailErr = "Email is required";
        } else {
          $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
          }
        }

        if (empty($_POST["message"])) {
            $messageErr = "Message is required";
          } else {
            $message = test_input($_POST["message"]);
            }
          }
      
        

if (isset($_POST['submit']) && $antispam == '4') {
    /* Anything that goes in here is only performed if the form is submitted */
    if (mail($to, $subject, $body, $from)) { 
      echo '<p>Your message has been sent!</p>';
      header("Location: email.php?mailsend");
  } else { 
      echo '<p>Something went wrong, go back and try again!</p>'; 
  }
 else if ($_POST['submit'] && $antispam != '4') {
  echo '<p>You answered the anti-spam question incorrectly!</p>';
 
 
?>