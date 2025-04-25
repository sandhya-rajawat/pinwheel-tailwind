<?php
include "./function.php";
$conn = db_connect();

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$msg = "";

// Get current user data
$stmt = $conn->prepare("SELECT name, email, phone, address, photo FROM profile WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"]  == "POST" && isset($_POST['submit'])) {
    $name    = $_POST["name"];
    $email   = $_POST["email"];
    $phone   = $_POST["phone"];
    $address = $_POST["address"];
    $photo   = $user['photo'];
    $password  = $user['password'];

    // Handle file upload
    if (!empty($_FILES["photo"]["name"])) {
        $uploadDir = "uploads/";
        $uploadFile = $uploadDir . basename($_FILES["photo"]["name"]);

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadFile)) {
            $photo = $uploadFile;
        }
    }

    $stmt = $conn->prepare("UPDATE profile SET name = ?, email = ?, phone = ?, address = ?, photo = ?, password=? WHERE user_id = ?");
    $stmt->bind_param("sssssii", $name, $email, $phone, $address, $photo,$password, $user_id);
    
    if ($stmt->execute()) {
        $msg = "Profile updated successfully!";
        // Refresh data
        $stmt = $conn->prepare("SELECT name, email, phone, address, photo  ,password FROM profile WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    } else {
        $msg = "Error updating profile.";
    }
    $stmt->close();
}

include './layouts/dashbord.php';
?>

<!-- HTML Layout -->
<div style="padding: 20px;">
    <h2>Edit Profile</h2>
    <p style="color: green;"><?= $msg ?></p>
    <form method="post" enctype="multipart/form-data">
        Name: <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>"><br><br>
        Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>"><br><br>
        Phone: <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>"><br><br>
        Address: <input type="text" name="address" value="<?= htmlspecialchars($user['address']) ?>"><br><br>
        
        password: <input type="text" name="password" value="<?= htmlspecialchars($user['password']) ?>"><br><br>
        Photo: <input type="file" name="photo"><br><br>

        <?php if (!empty($user['photo']) && file_exists($user['photo'])): ?>
            <img src="<?= htmlspecialchars($user['photo']) ?>" width="100" alt="Profile Picture"><br><br>
        <?php else: ?>
            <p>No profile photo uploaded.</p>
        <?php endif; ?>

        <input type="submit" name='submit' value="Save Changes">
    </form>
</div>
