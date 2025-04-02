<?php
include './function.php';  

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    redirect('signin.php');  
    echo "done";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get the form inputs
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $status = trim($_POST['status']);
    $user_id = $_SESSION['user_id'];

    // Thumbnail Upload logic
    $thumbnail = null;  
    if (!empty($_FILES['thumbnail']['name'])) {
        $target_dir = "./uploads";  
        
        // Create uploads directory if it doesn't exist
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file_name = time() . "_" . basename($_FILES["thumbnail"]["name"]);
        $target_file = $target_dir . "/" . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid extensions
        $valid_extensions = ["jpg", "jpeg", "png", "gif"];
        $errors = []; 
        if (!in_array($imageFileType, $valid_extensions)) {
            $errors['thumbnail'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
        } elseif ($_FILES["thumbnail"]["size"] > 5000000) { 
            $errors['thumbnail'] = "File size must be less than 5MB.";
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                $thumbnail = $file_name;
            } else {
                $errors['thumbnail'] = "Error uploading file.";
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

    if (empty($errors)) {
        $con = db_connect();  

        if ($con) {
            $stmt = $con->prepare("INSERT INTO blogs (title, thumbnail, description, status, user_id) VALUES (?, ?, ?, ?, ?)");
            if ($stmt === false) {
                $errors['database'] = "Error preparing the statement: " . $con->error;
            } else {
                $stmt->bind_param("ssssi", $title, $thumbnail, $description, $status, $user_id);

                if ($stmt->execute()) {
                    session_flash('success', 'Blog added successfully!');
                    redirect('blog.php');  
                } else {
                    $errors['database'] = "Error inserting data: " . $stmt->error;
                }
            }

            $stmt->close();
            $con->close();
        } else {
            $errors['database'] = "Database connection failed.";
        }
    }
}


$view_blade = "./blog-add.blade.php";  
include './layouts/default.php';
?>
