<?php
include './function.php';
$conn = db_connect();

if (!isset($_SESSION['user_id'])) {
    redirect("Location: signin.php");
    exit;
}

$profile_id = $_SESSION['user_id']; 
$stmt = $conn->prepare("SELECT name, email, phone, address,photo,password FROM profile WHERE id = ?");
$stmt->bind_param("i", $profile_id);
$stmt->execute();
$stmt->bind_result($name, $email, $phone, $address,$photo,$password);
$stmt->fetch();
$stmt->close();

include './layouts/dashbord.php';
?>

<!-- Profile Page Layout -->
<div class="p-6 max-w-2xl mx-auto">
    <h2 class="text-2xl font-semibold mb-6">My Profile</h2>

    <div class="bg-white shadow rounded p-6 space-y-4">
        <div class="flex items-center space-x-4">
            <?php if (!empty($photo) && file_exists("uploads/" . $photo)): ?>
                <img src="uploads/<?= htmlspecialchars($photo) ?>" alt="Profile Photo" class="w-24 h-24 rounded-full object-cover">
            <?php else: ?>
                <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                    No Photo
                </div>
            <?php endif; ?>
            <div>
                <h3 class="text-xl font-bold"><?= htmlspecialchars($name) ?></h3>
                <p class="text-sm text-gray-600"><?= htmlspecialchars($email) ?></p>
            </div>
        </div>

        <div>
            <label class="font-medium">Phone:</label>
            <p class="text-gray-700"><?= htmlspecialchars($phone) ?: "Not provided" ?></p>
        </div>

        <div>
            <label class="font-medium">Address:</label>
            <p class="text-gray-700"><?= htmlspecialchars($address) ?: "Not provided" ?></p>
        </div>
        <div>
            <label class="font-medium">Password:</label>
            <p class="text-gray-700"><?= htmlspecialchars($password) ?: "Not provided" ?></p>
        </div>

        <div>
            <a href="profile-edit.php" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Edit Profile
            </a>
        </div>
    </div>
</div>
