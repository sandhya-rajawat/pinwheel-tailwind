<?php
include './function.php';
function save_social_link($type, $url, $con)
{
    if (empty($url)) return;

    $check_stmt = $con->prepare("SELECT id FROM socials WHERE type = ?");
    $check_stmt->bind_param("s", $type);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        $update_stmt = $con->prepare("UPDATE socials SET url = ? WHERE type = ?");
        $update_stmt->bind_param("ss", $url, $type);
        $update_stmt->execute();
        $update_stmt->close();
    } else {
        $insert_stmt = $con->prepare("INSERT INTO socials (type, url) VALUES (?, ?)");
        $insert_stmt->bind_param("ss", $type, $url);
        $insert_stmt->execute();
        $insert_stmt->close();
    }

    $check_stmt->close();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $urls = [
        'facebook'  => trim($_POST['facebook']),
        'instagram' => trim($_POST['instagram']),
        'twitter'   => trim($_POST['twitter']),
        'linkedin'  => trim($_POST['linkedin']),
    ];

    $con = db_connect();

    if ($con) {

        save_social_link('facebook',  $urls['facebook'],  $con);
        save_social_link('instagram', $urls['instagram'], $con);
        save_social_link('twitter',   $urls['twitter'],   $con);
        save_social_link('linkedin',  $urls['linkedin'],  $con);

        $con->close();

        session_flash('success', 'Social links saved successfully!');
        redirect('footer.php');
    } else {
        $errors['database'] = "Database connection failed.";
    }
}

$view_blade = "./social-icon.blade.php";
include './layouts/default.php';
