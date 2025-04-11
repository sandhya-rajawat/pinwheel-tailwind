<?php
include './function.php';

// Check if the user is NOT logged in
if (!isset($_SESSION['user_id'])) {
    redirect('signin.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get the form inputs
    $type = trim($_POST['type']);
    $url = trim($_POST['url']);
   $user_id = $_SESSION['user_id'];

    // Thumbnail Upload logic
    $icon = null;
    $errors = [];

    if (!empty($_FILES['icon']['name'])) {
        $target_dir = "./uploads";

        // Create uploads directory if it doesn't exist
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_name = time() . "_" . basename($_FILES["icon"]["name"]);
        $target_file = $target_dir . "/" . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid extensions
        $valid_extensions = ["jpg", "jpeg", "png", "gif", "webp", "avif"];

        if (!in_array($imageFileType, $valid_extensions)) {
            $errors['icon'] = "Only JPG, JPEG, PNG, GIF, WEBP & AVIF files are allowed.";
        } elseif ($_FILES["icon"]["size"] > 5000000) {
            $errors['icon'] = "File size must be less than 5MB.";
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
                $icon = $file_name;
            } else {
                $errors['icon'] = "Error uploading file.";
            }
        }
    }

    // Validation for Title and Description
    if (empty($url)) {
        $errors['url'] = "url is required.";
    }
    if (empty($type)) {
        $errors['type'] = "type is required.";
    }
   

    // Insert into DB if no errors
    if (empty($errors)) {
        $con = db_connect();

        if ($con) {
            $stmt = $con->prepare("INSERT INTO socials (type, url, icon , user_id) VALUES (?, ?, ?, ?)");

            if ($stmt === false) {
                $errors['database'] = "Error preparing the statement: " . $con->error;
            } else {
                $stmt->bind_param("sssi", $type, $url, $icon, $user_id);

                if ($stmt->execute()) {
                    session_flash('success', 'social added successfully!');
                    redirect('footer.php');
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


$view_blade = "./social-icon.blade.php";
include './layouts/default.php';

