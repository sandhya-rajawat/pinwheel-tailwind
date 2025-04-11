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
    $content = trim($_POST['content']);
    $url = trim($_POST['url']);
    $user_id = $_SESSION['user_id'];

    // Thumbnail Upload logic
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

    // Validation for Title and Description
    if (empty($title)) {
        $errors['title'] = "Title is required.";
    }
    if (empty($description)) {
        $errors['description'] = "Description is required.";
    }
    if (empty($url)) {
      $errors['url'] = "url is required.";
  }
    if (empty($content)) {
        $errors['content'] = "content is required.";
    }
   

    // Insert into DB if no errors
    if (empty($errors)) {
        $con = db_connect();

        if ($con) {
            $stmt = $con->prepare("INSERT INTO integrations (title,description,image,url, user_id,content) VALUES (?, ?, ?, ?,?,?)");

            if ($stmt === false) {
                $errors['database'] = "Error preparing the statement: " . $con->error;
            } else {
                $stmt->bind_param("ssssis", $title,  $description, $image,$url, $user_id,$content);

                if ($stmt->execute()) {
                    session_flash('success', 'Media added successfully!');
                    redirect('integrations.php');
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


$view_blade = "./intergrations-details.blade.php";
include './layouts/default.php';
