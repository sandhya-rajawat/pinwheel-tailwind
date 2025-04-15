<?php
include "./function.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

  $title = trim($_POST['title']);
  $price = trim($_POST['price']);
  $content = trim($_POST['content']);
  $text = trim($_POST['text']);
  $description = trim($_POST['description']);

  // Validation
  if (empty($title)) {
    $errors['title'] = "Title is required.";
  }
  if (empty($price)) {
    $errors['price'] = "Price is required.";
  }
  if (empty($content)) {
    $errors['content'] = "Content is required.";
  }
  if (empty($text)) {
    $errors['text'] = "Text is required.";
  }
  if (empty($description)) {
    $errors['description'] = "Description is required.";
  }





  // Proceed if no validation errors
  if (empty($errors)) {
    $con = db_connect();

    if ($con) {
      $stmt = $con->prepare("INSERT INTO pricing (title, prices, content, text, description) VALUES (?, ?, ?, ?, ?)");

      if ($stmt === false) {
        $errors['database'] = "Error preparing the statement: " . $con->error;
      } else {
        $stmt->bind_param("sisss", $title, $price, $content, $text, $description);

        if ($stmt->execute()) {
          session_flash('success', 'Career Pricing added successfully!');
          redirect('./pricing-add.php');
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

$view_blade = "./pricing-add.blade.php";
include './layouts/default.php';
?>