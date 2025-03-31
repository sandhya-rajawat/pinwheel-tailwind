<?php
include './function.php';
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $status = trim($_POST['status']);
    $user_id = $_SESSION['user_id'];

    //  Thumbnail Upload
      $thumbnail = null;
      if (!empty($_FILES['thumbnail']['name'])) {
        $target_dir = "./uploads";
    
        //  Ensure folder exists
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
    
        $file_name = time() . "_" . basename($_FILES["thumbnail"]["name"]); //  Only filename
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        //  Check if image file is valid
        $valid_extensions = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $valid_extensions)) {
            $errors['thumbnail'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
        } elseif ($_FILES["thumbnail"]["size"] > 5000000) { // 5MB max
            $errors['thumbnail'] = "File size must be less than 5MB.";
        } else {
            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                $thumbnail = $file_name; //  Store only filename
            } else {
                $errors['thumbnail'] = "Error uploading file.";
            }
        }
    }
    
    

    //  Validation
    if (empty($title)) {
        $errors['title'] = "Title is required.";
    }
    if (empty($description)) {
        $errors['description'] = "Description is required.";
    }

    // Insert into database
    if (empty($errors)) {
        $con = db_connect();
        $stmt = $con->prepare("INSERT INTO blogs (title, thumbnail, description, status, user_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $title, $thumbnail, $description, $status, $user_id);

        if ($stmt->execute()) {
            header("Location: signin.php"); // Redirect to signin page
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
      }
        $stmt->close();
        $con->close();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Blog</title>
</head>
<body>
    <h2>Add New Blog</h2>
    <form method="POST" enctype="multipart/form-data"> 
        <label>Title:</label>
        <input type="text" name="title" required>
        <br>

        <label>Thumbnail:</label>
        <input type="file" name="thumbnail" accept="image/*">
        <br>

        <label>Description:</label>
        <textarea name="description" required></textarea>
        <br>

        <label>Status:</label>
        <select name="status">
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>
        <br>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
