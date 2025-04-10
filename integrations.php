<?php
include './function.php';

$con = db_connect();
$sql = "SELECT * FROM integrations";

$result = $con->query($sql);
if ($result->num_rows > 0) {
  $integration = $result->fetch_all(MYSQLI_ASSOC);
} else {
  $integration = [];
}
$con->close();

$view_blade = "./integrations.blade.php";
include './layouts/default.php';
