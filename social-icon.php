<?php
include './function.php';
function save_social_link($type, $url, $con)
{
    if (empty($url)) return;

    $check = mysqli_query($con, "SELECT id FROM socials WHERE type = '$type'");
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($con, "UPDATE socials SET url = '$url' WHERE type = '$type'");
    } else {
        mysqli_query($con, "INSERT INTO socials (type, url) VALUES ('$type', '$url')");
    }
}

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
