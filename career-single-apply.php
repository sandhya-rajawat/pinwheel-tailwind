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
  if (empty($title)) {
    $errors['title'] = "Add New job  is required.";
  }
  if (empty($description)) {
    $errors['description'] = "description is required.";
  }
 // Insert into DB if no errors
  if (empty($errors)) {
    $con = db_connect();

    if ($con) {
      $stmt = $con->prepare("INSERT INTO career_apply (title, description ,user_id ) VALUES (?, ?, ?)");

      if ($stmt === false) {
        $errors['database'] = "Error preparing the statement: " . $con->error;
      } else {
        $stmt->bind_param("ssi", $title, $description, $user_id);

        if ($stmt->execute()) {
          session_flash('success', '  job added successfully!');
          redirect('career-single.php');
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
$view_blade = "./career-single-apply.blade.php";
include './layouts/default.php';
