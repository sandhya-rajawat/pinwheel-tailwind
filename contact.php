<?php
include './function.php';
$view_blade = "./contact.blade.php";
include './layouts/default.php';
render_flash(); 
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

    if (empty($errors)) {
        // db function call..............................
        $con = db_connect();
        $stmt = $con->prepare("INSERT INTO detail (fullname, email, reason, message) VALUES (?, ?, ?, ?)");
        
        if ($stmt === false) {
            die("Error in SQL query: " . $con->error);
        }

        $stmt->bind_param("ssss", $name, $email, $reason, $message);

        if ($stmt->execute()) {
            session_flash('success', 'Form submitted successfully!');
        } else {
            session_flash('error', 'Error saving your message. Please try again.');
        }
          $stmt->close();
   
    } else {
        foreach ($errors as $error) {
            session_flash('error', $error);
        }
    }
}
?>
