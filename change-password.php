<?php
include './function.php'; 
$conn = db_connect();

// if (!isset($_SESSION['user_id'])) {
//     header("Location: signin.php");
//     exit;
// }
$user_id = $_SESSION['user_id'];
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];
    // Fetch current password from DB
    $stmt = $conn->prepare("SELECT password FROM user WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    if (!$user) {
        $msg = "User not found.";
    } elseif ($new_password !== $confirm_password) {
        $msg = "New password and confirm password do not match.";
    } elseif (!password_verify($current_password, $user["password"])) {
        $msg = "Current password is incorrect.";
    } else {
        // Hash new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE user SET password = ? WHERE user_id = ?");
        $stmt->bind_param("ss", $hashed_password, $user_id);
        if ($stmt->execute()) {
            $msg = "Password changed successfully!";
        } else {
            $msg = "Failed to update password.";
        }
        $stmt->close();
    }
}
$view_blade = "./change-password.blade.php";
include './layouts/dashbord.php';
