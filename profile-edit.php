<?php
include "./function.php";
$conn = db_connect();


if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$msg = "";

// Enable error reporting (for development)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch current user data
$stmt = $conn->prepare("SELECT fullname, email, password FROM user WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password_input = $_POST["password"];

    // If password is not empty, hash it; else, keep the old password
    if (!empty($password_input)) {
        $password = password_hash($password_input, PASSWORD_DEFAULT);
    } else {
        $password = $user['password']; // keep old hashed password
    }

    // Update user info
    $stmt = $conn->prepare("UPDATE user SET fullname = ?, email = ?, password = ? WHERE id = ?");
    $stmt->bind_param("sssi", $fullname, $email, $password, $user_id);

    if ($stmt->execute()) {
        $msg = "Profile updated successfully!";

        // Refresh user data
        $stmt = $conn->prepare("SELECT fullname, email, password FROM user WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    } else {
        $msg = "Error updating profile: " . $stmt->error;
    }
    $stmt->close();
}
$view_blade = "./profile-edit.blade.php";
include './layouts/dashbord.php';

?>
<!-- 