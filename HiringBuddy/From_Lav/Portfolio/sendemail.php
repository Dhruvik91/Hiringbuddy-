<?php
if(isset($_POST['submit'])){
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    //Headers for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //Additional headers
    $headers .= "From: Your Name <youremail@example.com>" . "\r\n";
    $headers .= "Cc: youremail2@example.com" . "\r\n";

    //Send email using PHP's mail function
    if(mail($to,$subject,$message,$headers)){
        echo "Email sent successfully!";
    } else {
        echo "Error sending email.";
    }
}
?>
