<?php
session_start();

function session_flash($key, $message)
{
    if (!isset($_SESSION['flash'])) {
        $_SESSION['flash'] = [];
    }
    $_SESSION['flash'][$key] = $message;
}

function render_flash()
{
    if (isset($_SESSION['flash'])) {
        foreach ($_SESSION['flash'] as $key => $message) {
            if ($key === "success" || $key === "error") {
                echo "<script>alert('$message');</script>";
            }
        }
        unset($_SESSION['flash']);
    }
}
