<?php
if (isset($_POST['submit'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "p.olegov@yahoo.com";
    $email_subject = "Mail from Maverik";


    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email = $_POST['email']; // required
    $phone = $_POST['phone']; // required
    $comment = $_POST['comment']; // required

    $email_message = "Form details below.\n\n";


    $email_message .= "First Name: " . clean_string($first_name) . "\n";
    $email_message .= "Last Name: " . clean_string($last_name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Telephone: " . clean_string($phone) . "\n";
    $email_message .= "Comments: " . clean_string($comment) . "\n";

    echo 'Hello' + $first_name;
// create email headers
    $headers = 'From: ' . $email. "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
}
?>