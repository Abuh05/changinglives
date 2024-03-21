<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["form_name"];
    $gender = $_POST["form_subject_gender"];
    $email = $_POST["form_email"];
    $how_did_you_hear = $_POST["form_subject_hear"];
    $message = $_POST["form_message"];
    $errors = array();

    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate message
    if (empty($message)) {
        $errors[] = "Message is required";
    }

    if (empty($errors)) {
        // Set up the email
        $to = "abuhsolo05@gmail.com"; // Change this to your email address
        $subject = "Contact Form Submission";
        $body = "Name: $name\nGender: $gender\nEmail: $email\nHow did you hear about us: $how_did_you_hear\nMessage: $message";

        // Send the email
        if (mail($to, $subject, $body)) {
            echo "<p class='alert alert-success'>Message sent successfully!</p>";
        } else {
            echo "<p class='alert alert-danger'>Message could not be sent. Please try again later.</p>";
        }
    } else {
        // Output validation errors
        foreach ($errors as $error) {
            echo "<p class='alert alert-danger'>$error</p>";
        }
    }
}
?>
