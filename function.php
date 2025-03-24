<?php
function openurl() {
    if ($_SERVER['REQUEST_URI'] !== "/pinwheel_file/pinwheel-tailwind/index.php") {
        header("Location: http://localhost/pinwheel_file/pinwheel-tailwind/index.php");
        exit();
    }
}

openurl();
?>

