<?php
session_start(); 
function session_flash($type, $message) {
    $_SESSION['flash_messages'][] = ['message' => $message, 'type' => $type];
}
function render_flash() {
    if (!empty($_SESSION['flash_messages'])) {
        foreach ($_SESSION['flash_messages'] as $flash) {
            $color = ($flash['type'] === 'success') ? 'green' : 'red';
            echo "<p style='color: $color; font-weight: bold;'>" . $flash['message'] . "</p>";
            echo "<script>alert('" . addslashes($flash['message']) . "');</script>"; 
        }
        unset($_SESSION['flash_messages']); 
    }
}
?>
