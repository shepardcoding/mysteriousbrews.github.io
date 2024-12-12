<?php
ob_start();

// Retrieve the form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phonenumber = $_POST['phonenumber'];
$emailaddress = $_POST['emailaddress'];
$message = $_POST['message'];

// Compose the email message
$to = 'mysteriousbrews@gmail.com';
$subject = 'New contact form submission';
$body = "First Name: $firstname\n" .
        "Last Name: $lastname\n" .
        "Contact Number: $phonenumber\n" .
        "Email Address: $emailaddress\n" .
        "Message: $message";
$headers = "From: $emailaddress";

// Send the email
if (mail($to, $subject, $body, $headers)) {
  // Display the confirmation message
  echo '<p>Thank you for submitting the form! We will get back to you shortly.</p>';

  // Redirect the user back to the site after a short delay
  header('Refresh: 2; URL=https://www.mysteriousbrews.com/index.html');
  ob_end_flush();
  exit();
} else {
  // Display an error message if the email could not be sent
  echo '<p>Sorry, there was an error submitting the form. Please try again later.</p>';
  ob_end_flush();
  exit();
}
?>




