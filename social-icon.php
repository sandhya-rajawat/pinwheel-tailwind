<?php
include './function.php';
$errors = [];
$saved_links = [];
$con = db_connect();


if ($con) {
    $query = "SELECT * FROM socials";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $saved_links[$row['type']] = $row['url'];
        }
    }

    $con->close();
}
//  Handle form submission...............................
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $urls = [
        'facebook'  => trim($_POST['facebook']),
        'instagram' => trim($_POST['instagram']),
        'twitter'   => trim($_POST['twitter']),
        'linkedin'  => trim($_POST['linkedin']),
    ];

    $con = db_connect();

    if ($con) {
        // Prepare the INSERT statement
        $stmt = $con->prepare("INSERT INTO socials (type, url) VALUES (?, ?)");
        if ($stmt === false) {
            $errors['database'] = "Prepare failed: " . $con->error;
        } else {
            foreach ($urls as $type => $url) {
                if (!empty($url)) {
                    $stmt->bind_param("ss", $type, $url); // bind values
                    if (!$stmt->execute()) {
                        $errors['insert'][$type] = "Failed to save $type: " . $stmt->error;
                    }
                }
            }

            $stmt->close();
        }
    }

    $con->close();

    if (empty($errors)) {
        session_flash('success', 'Social links saved successfully!');
        redirect('footer.php');
    }
} else {
    $errors['database'] = "Database connection failed.";
}

$view_blade = "./social-icon.blade.php";
include './layouts/default.php';
