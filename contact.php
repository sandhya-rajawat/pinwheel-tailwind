<?php
include './function.php';  

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Validate Name.........................
    $name = trim(htmlspecialchars($_POST["name"]));
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }

    // Validate Email..................................
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid email is required.";
    }

    // Validate Reason...............................................
    $reason = trim(htmlspecialchars($_POST["reason"]));
    if (empty($reason)) {
        $errors['reason'] = "Reason cannot be empty.";
    }

    // Validate Message...................................................
    $message = trim(htmlspecialchars($_POST["message"]));
    if (empty($message)) {
        $errors['message'] = "Message cannot be empty.";
    }

    if (empty($errors)) {
        $con = db_connect();

        if ($con->connect_error) {
            session_flash('error', 'Database connection error. Please try again later.');
        } else {
            $stmt = $con->prepare("INSERT INTO detail (fullname, email, reason, message) VALUES (?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("ssss", $name, $email, $reason, $message);
                if ($stmt->execute()) {
                    session_flash('success', 'Form submitted successfully!');
                } else {
                    session_flash('error', 'Error saving your message. Please try again.');
                }
                $stmt->close();
            } else {
                error_log("SQL Error: " . $con->error);
                session_flash('error', 'An error occurred. Please try again later.');
            }
            $con->close();
        }
    }
}

$view_blade = "./contact.blade.php";  
include './layouts/default.php'; 
?>
