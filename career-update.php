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
  $time = trim($_POST['time']);
  $location = trim($_POST['location']);
 
  $user_id = $_SESSION['user_id'];

  

  
  if (empty($title)) {
      $errors['title'] = "Title is required.";
  }
  if (empty($description)) {
      $errors['description'] = "description is required.";
  }
 
  if (empty($time)) {
      $errors['time'] = "time is required.";
  }
 
  if (empty($location)) {
      $errors['location'] = "location is required.";
  }
 

  // Insert into DB if no errors
  if (empty($errors)) {
      $con = db_connect();

      if ($con) {
          $stmt = $con->prepare("INSERT INTO careers (title, description,time, location,user_id ) VALUES (?, ?, ?, ?,?)");

          if ($stmt === false) {
              $errors['database'] = "Error preparing the statement: " . $con->error;
          } else {
              $stmt->bind_param("ssssi", $title, $description,$time,$location,$user_id);

              if ($stmt->execute()) {
                  session_flash('success', ' career added successfully!');
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




$view_blade = "./career-update.blade.php";
include './layouts/default.php';

