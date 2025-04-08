<?php

include './function.php';

// Uncomment this if login is required
// if(!isset($_SESSION['team_id'])){
//   redirect('signin.php');
// }

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
  $name = trim($_POST['name']);
  $designation = trim($_POST['designation']);
  $sorting = trim($_POST['sorting']);
  // $team_id = $_SESSION['team_id'];

  $photo = null;
  $errors = [];

  // Photo upload
  if (!empty($_FILES['photo']['name'])) {
    $target_dir = "./uploads";

    if (!is_dir($target_dir)) {
      mkdir($target_dir, 0777, true);
    }

    $file_name = time() . "_" . basename($_FILES["photo"]["name"]);
    $target_file = $target_dir . "/" . $file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $valid_extensions = ["jpg", "jpeg", "png", "gif", "webp", "avif"];

    if (!in_array($imageFileType, $valid_extensions)) {
      $errors['photo'] = "Only JPG, JPEG, PNG, GIF, WEBP & AVIF files are allowed.";
    } elseif ($_FILES["photo"]["size"] > 5000000) {
      $errors['photo'] = "File size must be less than 5MB.";
    } else {
      if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $photo = $file_name;
      } else {
        $errors['photo'] = "Error uploading file.";
      }
    }
  }

  // Validations
  if (empty($name)) {
    $errors['name'] = "Name is required.";
  }

  if (empty($designation)) {
    $errors['designation'] = "Designation is required.";
  }

  if (empty($sorting)) {
    $errors['sorting'] = "Sorting is required.";
  }

  // Insert into DB
  if (empty($errors)) {
    $con = db_connect();

    if ($con) {
      $stmt = $con->prepare("INSERT INTO teams (name, photo, designation, sorting) VALUES (?, ?, ?, ?)");


      if ($stmt === false) {
        $errors['database'] = "Error preparing the statement: " . $con->error;
      } else {
        $stmt->bind_param("ssss", $name, $photo, $designation, $sorting);

        if ($stmt->execute()) {
          session_flash('success', 'Team member added successfully!');
          redirect('about.php');
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

$view_blade = "./about-teams.blade.php";
include './layouts/default.php';
