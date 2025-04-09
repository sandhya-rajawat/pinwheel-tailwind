<?php

include './function.php';

$con = db_connect();
$sql = "SELECT * FROM blogs";

$result = $con->query($sql);
if ($result->num_rows > 0) {
  $blogs = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $blogs = [];
}


$view_blade = "./blog.blade.php";
include './layouts/default.php';
$con->close();
