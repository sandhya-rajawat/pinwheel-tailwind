<?php
include "./function.php";



$con = db_connect();
$sql = "SELECT * FROM pricing";

$result = $con->query($sql);
if ($result->num_rows > 0) {
  $prices = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $prices = [];
}

$sql = "SELECT * FROM pricing_details";

$result = $con->query($sql);
if ($result->num_rows > 0) {
  $price_detail = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $price_detail = [];
}
$con->close();
$view_blade = "./pricing.blade.php";
include './layouts/default.php';




?>