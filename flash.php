<?php
session_start(); // Make sure session is started

function session_flash($key, $message) {
    $_SESSION['flash'][$key] = $message;
}

function render_flash() {
    if (isset($_SESSION['flash'])) {
        echo "<script>";
        foreach ($_SESSION['flash'] as $key => $message) {
            echo "alert('$message');";  
        }
        echo "</script>";

        unset($_SESSION['flash']);
    }
}
?>
