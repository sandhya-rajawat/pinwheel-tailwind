<?php
include './function.php';
$sql = "SELECT * FROM teams";
$con = db_connect();
$result = $con->query($sql);
if ($result->num_rows > 0) {
  $teams = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $teams = [];
}

$view_blade = "./about.blade.php";
include './layouts/default.php';
