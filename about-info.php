<?php
include './function.php';

// Check if the user is NOT logged in
if (!isset($_SESSION['user_id'])) {
  redirect('signin.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  // Get the form inputs
  $number = trim($_POST['number']);
  $title = trim($_POST['title']);
  $discription = trim($_POST['discription']);
 
  $user_id = $_SESSION['user_id'];

  

  // Validation for Title and Description
  if (empty($number)) {
    $errors['number'] = "Number are required.";
}
  if (empty($title)) {
      $errors['title'] = "Title is required.";
  }
  if (empty($discription)) {
      $errors['discription'] = "discription is required.";
  }
 

  // Insert into DB if no errors
  if (empty($errors)) {
      $con = db_connect();

      if ($con) {
          $stmt = $con->prepare("INSERT INTO teams_rules (number,title, description, user_id) VALUES (?, ?, ?, ?)");

          if ($stmt === false) {
              $errors['database'] = "Error preparing the statement: " . $con->error;
          } else {
              $stmt->bind_param("issi",$number, $title, $discription, $user_id);

              if ($stmt->execute()) {
                  session_flash('success', 'Blog added successfully!');
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


$view_blade = "./about-info.blade.php";
include './layouts/default.php';
