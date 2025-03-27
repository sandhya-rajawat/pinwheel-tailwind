<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './database.php';




  function get_url($file_name) {
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
  $host = $_SERVER['HTTP_HOST'];
  $path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

  return "$protocol://$host$path/$file_name";
}



?>

