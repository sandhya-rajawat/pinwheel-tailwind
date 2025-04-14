<?php
include './function.php';
$errors = [];
$saved_links = [];

// Fetch existing social links
$con = db_connect();
if ($con) {
    $result = $con->query("
        SELECT type, url FROM socials
        WHERE id IN (
            SELECT MAX(id) FROM socials GROUP BY type
        )
    ");

    if ($result && $result->num_rows > 0) {
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
        // Prepare insert/update statement
        $stmt = $con->prepare("
            INSERT INTO socials (type, url)
            VALUES (?, ?)
            ON DUPLICATE KEY UPDATE url = VALUES(url)
        ");

        if ($stmt === false) {
            $errors['database'] = "Prepare failed: " . $con->error;
        } else {
            foreach ($urls as $type => $url) {
                if (!empty($url)) {
                    $stmt->bind_param("ss", $type, $url);
                    if (!$stmt->execute()) {
                        $errors['insert'][$type] = "Failed to save $type: " . $stmt->error;
                    }
                }
            }

            $stmt->close();
        }

        $con->close();

        if (empty($errors)) {
            session_flash('success', 'Social links saved successfully!');
            redirect('footer.php');
        }
    } else {
        $errors['database'] = "Database connection failed.";
    }
}
$view_blade = "./social-icon.blade.php";
include './layouts/default.php';
