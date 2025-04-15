<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './database.php';
include_once 'flash.php';

function get_url($file_name)
{
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
  $host = $_SERVER['HTTP_HOST'];
  $path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
  return "$protocol://$host$path/$file_name";
}

function redirect($url)
{
  header("Location: $url");
  exit();
}
// footer-social-icon..................
function getSocialLinks()
{

  $conn = db_connect();
  $sql = "SELECT * FROM socials";
  $result = $conn->query($sql);
  $social = [];
  if ($result && $result->num_rows > 0) {
  $social = $result->fetch_all(MYSQLI_ASSOC);
  foreach ($social as &$item) {
      if (isset($item['url'])) {
        $item['is_valid'] = filter_var($item['url'], FILTER_VALIDATE_URL) ? true : false;
      } else {
        $item['is_valid'] = false;
      }
    }
    unset($item);
  }
  $conn->close();
  return $social;
}
