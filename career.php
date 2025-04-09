<?php
include './function.php';

$con = db_connect();
$sql = "SELECT * FROM careers";

$result = $con->query($sql);
if ($result->num_rows > 0) {
  $careers = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $careers = [];
}

$sql2 = "SELECT * FROM career_benefits";
$career_result = $con->query($sql2); 
if ($career_result->num_rows > 0) {
  $career_benefits = $career_result->fetch_all(MYSQLI_ASSOC);
} else {
  $career_benefits= [];
}

$view_blade = "./career.blade.php";
include './layouts/default.php';
