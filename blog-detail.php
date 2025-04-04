<?php
include './function.php';
$con = db_connect();

// Get blog ID from GET
if (isset($_GET['id'])) {
  $blog_id = intval($_GET['id']); 
  $stmt = $con->prepare("SELECT * FROM blogs WHERE id = ?");
  $stmt->bind_param("i", $blog_id);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows > 0) {
      $blog = $result->fetch_assoc();
  
  } else {
      session_flash('error', 'Blog Not Found!!');
    
  }
  $stmt->close();
} else {
  session_flash('error', 'Invalid Request');

}


// -------------------- Form Submission ------------------------
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = trim(htmlspecialchars($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $website = trim(htmlspecialchars($_POST["website"]));
    $message = trim(htmlspecialchars($_POST["message"]));

    if (empty($name)) $errors['name'] = "Name is required.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Valid email is required.";
    if (empty($website)) $errors['website'] = "Website cannot be empty.";
    if (empty($message)) $errors['message'] = "Message cannot be empty.";

    if (empty($errors)) {
        $check_stmt = $con->prepare("SELECT email FROM blog_detail WHERE email = ?");
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            session_flash('error', 'This email is already registered.');
        } else {
            $stmt = $con->prepare("INSERT INTO blog_detail (name, email, website, message) VALUES (?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("ssss", $name, $email, $website, $message);
                if ($stmt->execute()) {
                    session_flash('success', 'Form submitted successfully!');
                } else {
                    session_flash('error', 'Error saving your message. Please try again.');
                }
                $stmt->close();
            } else {
                error_log("SQL Error: " . $con->error);
                session_flash('error', 'An error occurred. Please try again later.');
            }
        }

        $con->close();
    }
}

$view_blade = './blog-detail.blade.php';
include './layouts/default.php';
?>
