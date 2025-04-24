<?php
include "./function.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

  $title = trim($_POST['title']);
 
  $description = trim($_POST['description']);

  // Validation
  if (empty($title)) {
    $errors['title'] = "Title is required.";
  }

  if (empty($description)) {
    $errors['description'] = "Description is required.";
  }
// Proceed if no validation errors
  if (empty($errors)) {
    $con = db_connect();

    if ($con) {
      $stmt = $con->prepare("INSERT INTO pricing_details (title, description) VALUES (?,?)");

      if ($stmt === false) {
        $errors['database'] = "Error preparing the statement: " . $con->error;
      } else {
        $stmt->bind_param("ss", $title,$description);

        if ($stmt->execute()) {
          session_flash('success', 'Career Pricing added successfully!');
          redirect('./pricing-detail.php');
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

$view_blade = "./pricing-detail-blade.php";
include './layouts/default.php';
?>