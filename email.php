<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // Validate email address
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<p>Invalid email format.</p>";
    exit;
  }

  // Set up email headers and body
  $to = "mohsinkhanzda@gmail.com";
  $headers = "From: $name <$email>\r\n";
  $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";

  // Send email
  if (mail($to, $subject, $body, $headers)) {
    echo "<p>Your message has been sent.</p>";
  } else {
    echo "<p>There was an error sending your message.</p>";
  }
}
?>