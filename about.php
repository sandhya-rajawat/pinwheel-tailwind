<?php
include './function.php';
$con = db_connect();

// Fetch all teams
$sql = "SELECT * FROM teams";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $teams = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $teams = [];
}

// Fetch all rules from teams_rules
$sql2 = "SELECT * FROM teams_rules";
$teams_result = $con->query($sql2); // ✅ using $sql2 here!
if ($teams_result->num_rows > 0) {
  $teams_blog = $teams_result->fetch_all(MYSQLI_ASSOC);
} else {
  $teams_blog = [];
}

$con->close();
$view_blade = "./about.blade.php";
include './layouts/default.php';
