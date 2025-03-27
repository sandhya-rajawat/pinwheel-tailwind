<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './function.php';
$view_blade = "./contact.blade.php";
include './layouts/default.php';

$con = db_connect();

if (isset($_POST['submit'])) {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $reason = trim($_POST["reason"]);
    $message = trim($_POST["message"]);

    // Validation rules
    $errors = [];
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }
    if (empty($reason)) {
        $errors[] = "Reason cannot be empty.";
    }
    if (empty($message)) {
        $errors[] = "Message cannot be empty.";
    }

    // If no errors, insert into database
    if (empty($errors)) {
        // ✅ Correct SQL Query Using Placeholders
        $stmt = $con->prepare("INSERT INTO detail (fullname, email, reason, message) VALUES (?, ?, ?, ?)");
        
        if ($stmt === false) {
            die("Error in SQL query: " . $con->error);
        }

        $stmt->bind_param("ssss", $name, $email, $reason, $message);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Your message has been sent successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error saving your message. Please try again.</p>";
        }

        $stmt->close();
        echo "<script>alert('Message Sent Successfully');</script>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>
