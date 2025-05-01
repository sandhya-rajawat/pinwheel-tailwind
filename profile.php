<?php
include './function.php';
$conn = db_connect();

if (!isset($_SESSION['user_id'])) {
    redirect("Location: signin.php");
    exit;
}

$profile_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT fullname,email, password,image FROM user WHERE id = ?");
$stmt->bind_param("i", $profile_id);
$stmt->execute();
$stmt->bind_result($fullname, $email,$password,$image);
$stmt->fetch();
$stmt->close();

$view_blade = "./profile.blade.php";
include './layouts/dashbord.php';
