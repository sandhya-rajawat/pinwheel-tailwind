<?php
include './function.php';
if (isset($_GET['id'])) {
    $blog_id = $_GET['id'];
    $conn = db_connect();
    $stmt = $conn->prepare("SELECT * FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $blog_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $blog = $result->fetch_assoc();
    } else {
        session_flash('error', 'Blog Not Found!!');
        header("Location: blog.php");
        exit;
    }
 
} 
   
$stmt->close();
$conn->close();

$view_blade = './blog-detail.blade.php';
include './layouts/default.php';
?>
$view_blade = './blog-detail.blade.php';
include './layouts/default.php';



?>

