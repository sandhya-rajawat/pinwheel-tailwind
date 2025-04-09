<?php
include './function.php';


$errors = []; 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    if (empty($email)) {
      $errors['email'] = "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Invalid email format.";
  }
    $password = trim($_POST['password']);
    if (empty($password)) {
      $errors['password'] = "Password is required.";
  }
  if (empty($errors)) {
        $con = db_connect();
        if ($con->connect_error) {
            die("Database connection failed: " . $con->connect_error);
        }
  $stmt = $con->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id']=$user['id'];
        $_SESSION['user_name']=$user['fullname'];
     header("Location: index.php");
        exit();
    } else {
        session_flash('error', 'Invalid email or password. Please try again!');
    }

    $stmt->close();
    $con->close();
}
}

$view_blade = "./signin.blade.php";
include './layouts/default.php';
?>
