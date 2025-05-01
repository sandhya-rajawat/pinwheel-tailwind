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
    $phone = trim(htmlspecialchars($_POST["phone"]));
    if (empty($phone)) {
        $errors['phone'] = " phone is required.";
    }

    $address = trim(htmlspecialchars($_POST["address"]));
    if (empty($address)) {
        $errors['address'] = " address is required.";
    }
    $password = trim($_POST["password"]);
    if (empty($password)) {
        $errors['password'] = " Password cannot be empty.";
    } elseif (strlen($password) < 8) {
        $errors['password'] = " Password must be at least 8 characters.";
    }

    $image = null;
    $errors = [];

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "./uploads";

        // Create uploads directory if it doesn't exist
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_name = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . "/" . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid extensions
        $valid_extensions = ["jpg", "jpeg", "png", "gif", "webp", "avif"];

        if (!in_array($imageFileType, $valid_extensions)) {
            $errors['image'] = "Only JPG, JPEG, PNG, GIF, WEBP & AVIF files are allowed.";
        } elseif ($_FILES["image"]["size"] > 5000000) {
            $errors['image'] = "File size must be less than 5MB.";
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = $file_name;
            } else {
                $errors['image'] = "Error uploading file.";
            }
        }
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
                $stmt = $con->prepare("INSERT INTO user (fullname, email, password ,image,address,phone) VALUES (?, ?, ?,?,?,?)");

                if ($stmt) {
                    $stmt->bind_param("sssssi", $name, $email, $hashed_password, $image, $address, $phone);

                    if ($stmt->execute()) {


                        session_flash('success', 'Registration successful!');
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['user_name'] = $user['fullname'];
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
