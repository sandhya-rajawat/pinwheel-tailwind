<?php
include './function.php';

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = trim(htmlspecialchars($_POST["name"]));
    if (empty($name)) {
        $errors['name'] = " Name is required.";
    }
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = " Valid email is required.";
    }
    $password = trim($_POST["password"]);
    if (empty($password)) {
        $errors['password'] = " Password cannot be empty.";
    } elseif (strlen($password) < 8) {
        $errors['password'] = " Password must be at least 8 characters.";
    }
    if (empty($errors)) {
        $con = db_connect();

        if ($con->connect_error) {
            die(" Database connection failed: " . $con->connect_error);
        } else {

            $check_email_query = "SELECT id FROM user WHERE email = ?";
            $stmt_check = $con->prepare($check_email_query);
            $stmt_check->bind_param("s", $email);
            $stmt_check->execute();
            $stmt_check->store_result();
            if ($stmt_check->num_rows > 0) {
                $errors['email'] = "This email is already registered. Try another one.";
            } else {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                //  **Correct SQL Query**
                $stmt = $con->prepare("INSERT INTO user (fullname, email, password) VALUES (?, ?, ?)");

                if ($stmt) {
                    $stmt->bind_param("sss", $name, $email, $hashed_password);
                    if ($stmt->execute()) {

                      
                        session_flash('success', 'Registration successful!');
                        $_SESSION['user_id']=$user['id'];
                        $_SESSION['user_name']=$user['fullname'];
                     header("Location: index.php");
                        exit();
                    } else {
                        session_flash('error', ' Error saving your data. Try again.');
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
}

$view_blade = "./signup.blade.php";
include './layouts/default.php';
