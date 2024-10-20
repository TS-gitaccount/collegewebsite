// <?php
// $name = htmlspecialchars($_POST['name']);
// $email=htmlspecialchars($_POST['email']);
// $subject=htmlspecialchars($_POST['subject']);
// $message=htmlspecialchars($_POST['message']);

// if (!empty($name) && !empty($email) && !empty($subject)&& !empty($message)) {
        
//         echo "Thank you for your feedback, $name!<br>";
//         echo "Email: $email<br>";


//   $to = "charu18092005@gmail.com"; // Change this to your email
//         $subject = "New Feedback from $name";
//         $mess = "Name: $name\nEmail: $email\nMessae:\n$message";
//         $headers = "From: $email";

//         if (mail($to, $subject, $message, $headers)) {
//             echo "<br>Feedback has been sent via email.";
//         } else {
//             echo "<br>Sorry, there was an issue sending your feedback.";
//         }

//     } else {
//         echo "All fields are required.";
//     }
// } else {
//     echo "Invalid Request.";
// }
// ?>

// <!--  $email_from=$_POST['email'];  //domain name

// $email_subject='New Form Submission';

// $email_body=" User Name : $name .\n".
//             "User Email: $visitor_email.\n".
//             "Subject: $subject.\n".
//             "User Message: $message .\n";

// $to='charu18092005@gmail.com'; //your email to store

// $headers="From: $email_from \r\n";

// $headers .= "Reply-To : $visitor_email \r\n";

// mail($to,$email_subject,$email_body,$headers);

// header("location: contact.html")
// ?> 
//  -->
















<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize the inputs
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

    // Check if required fields are filled
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "All fields are required!";
        exit;
    }

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    // You can either store the form data in a database or send an email.
    // Here is an example of how to send an email using PHP's mail() function.

    $to = "charu18092005@gmail.com";  // Replace with your email address
    $headers = "From: $email\r\nReply-To: $email\r\n";
    $fullMessage = "Name: $name\n\nMessage: $message";

    // Send email
    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message!";
    }
} else {
    echo "Invalid request method.";
}
?>
