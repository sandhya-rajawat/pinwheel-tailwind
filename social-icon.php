<?php
include './function.php';


$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $urls = [
        'facebook'  => trim($_POST['facebook']),
        'instagram' => trim($_POST['instagram']),
        'twitter'   => trim($_POST['twitter']),
        'linkedin'  => trim($_POST['linkedin']),
    ];

    $con = db_connect();

    if ($con) {
        $stmt = $con->prepare("INSERT INTO socials (type, url) VALUES (?, ?)");

        if ($stmt === false) {
            $errors['database'] = "Prepare failed: " . $con->error;
        } else {
            foreach ($urls as $type => $url) {
                if (!empty($url)) {
                    $stmt->bind_param("ss", $type, $url);
                    if (!$stmt->execute()) {
                        $errors['insert'][$type] = "Failed to insert $type: " . $stmt->error;
                    }
                }
            }

            $stmt->close();
        }

        $con->close();

        if (empty($errors)) {
            session_flash('success', 'Social links added successfully!');
            redirect('footer.php');
        }
    } else {
        $errors['database'] = "Database connection failed.";
    }
}

$view_blade = "./social-icon.blade.php";
include './layouts/default.php';
