<?php
include "./function.php";
$conn = db_connect();


if (!isset($_SESSION['user_id'])) {
    redirect("Location: signin.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$msg = "";

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch current user data including phone and image
$stmt = $conn->prepare("SELECT fullname, email, address, phone, image FROM user WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $address = trim($_POST["address"]);
    $phone = trim($_POST["phone"]);

    // Handle image upload
    $image = $user['image']; // default to existing image

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "./uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $filename = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $filename;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $valid_extensions = ["jpg", "jpeg", "png", "gif", "webp", "avif"];

        if (in_array($imageFileType, $valid_extensions) && $_FILES["image"]["size"] <= 5000000) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = $filename;
            } else {
                $msg = "Error uploading the image.";
            }
        } else {
            $msg = "Invalid image format or size. (Max 5MB)";
        }
    }

    // Update user info
    $stmt = $conn->prepare("UPDATE user SET fullname = ?, email = ?, image = ?, address = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $fullname, $email, $image, $address, $phone, $user_id);

    if ($stmt->execute()) {
        $msg = "Profile updated successfully!";
        // Refresh user data
        $stmt = $conn->prepare("SELECT fullname, email, address, phone, image FROM user WHERE id = ?");
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
