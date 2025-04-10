<?php

include './function.php';

// Check if the user is NOT logged in
if (!isset($_SESSION['user_id'])) {
    redirect('signin.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get the form inputs
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $user_id = $_SESSION['user_id'];

    // Image upload logic
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
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = $file_name;
            } else {
                $errors['image'] = "Error uploading file.";
            }
        }
    }

    // Validation
    if (empty($title)) {
        $errors['title'] = "Title is required.";
    }

    if (empty($description)) {
        $errors['description'] = "Description is required.";
    }

    // Insert if no errors
    if (empty($errors)) {
        $con = db_connect();

        if ($con) {
            $stmt = $con->prepare("INSERT INTO career_benefits(image, title, description, user_id) VALUES (?, ?, ?, ?)");

            if ($stmt === false) {
                $errors['database'] = "Error preparing the statement: " . $con->error;
            } else {
                $stmt->bind_param("sssi", $image, $title, $description, $user_id);

                if ($stmt->execute()) {
                    session_flash('success', 'Competitive salary added successfully!');
                    redirect('career.php');
                } else {
                    $errors['database'] = "Error inserting data: " . $stmt->error;
                }

                $stmt->close();
            }

            $con->close();
        } else {
            $errors['database'] = "Database connection failed.";
        }
    }
}

$view_blade = "./career-benefits.blade.php";
include './layouts/default.php';
