<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './function.php';

$view_blade = "./contact.blade.php";
include './layouts/default.php';

$con = db_connect();


if(isset($_POST['submit'])) {

$name = isset($_POST["name"]) ? trim($_POST["name"]) : "";

$email = isset($_POST["email"]) ? trim($_POST["email"]) : "";

$reasonpurpose = isset($_POST["reason"]) ? trim($_POST["reason"]) : "";

$message = isset($_POST["message"]) ? trim($_POST["message"]) : "";

    // Validation rules
    if (empty($name)) {
        $errors[] = "Name is required.";
     }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
   }
    if (empty($reasonpurpose)) {
        $errors[] = "Message cannot be empty.";
    }
    if (empty($message)) {
        $errors[] = "Message cannot be empty.";
    }

    // If no errors, insert into database
    if (empty($errors)) {
      
        
        $stmt = $con->prepare("INSERT INTO `pinwheel-detail`(fullname, email, reason,
     
        message) VALUES ($name, $email, $reasonpurpose,$message)");
        $stmt->bind_param("ssss", $name, $email,$reasonpurpose, $message);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Your message has been sent successfully!</p>";
        
        } else {
            echo "<p style='color: red;'>Error saving your message. Please try again.</p>";
        }
        $stmt->close();
        echo "<script>alert ('done');</script>";
    }

}
?>





