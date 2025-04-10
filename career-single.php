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


$sql = "SELECT * FROM career_apply";

$row = $con->query($sql);
if ($row->num_rows > 0) {
  $career_apply = $row->fetch_all(MYSQLI_ASSOC);
} else {
  $career_apply = [];
}





$sql = "SELECT * FROM career_single";

$result = $con->query($sql);
if ($result->num_rows > 0) {
  $career_singles = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $career_singles = [];
}



$view_blade = "./career-single.blade.php";
include './layouts/default.php';
