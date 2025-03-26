<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function db_connect() {
    $servername = 'localhost';
    $username = 'root';
    $password = 's@ndhya1133';
    $database = 'pinwheel';
    $port = 33066;
  
    $con = new mysqli($servername, $username, $password, $database, $port);
    
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    
    return $con;
}

function db_close($con) {
    if ($con) {
        $con->close();
    }
}

$con = db_connect();
echo "Connected successfully!";


db_close($con);
?>
