<?php

require_once "config.php";

// Telegramdan kelgan ma'lumot
$update = json_decode(file_get_contents("php://input"), true);

// Agar xabar kelmagan bo'lsa
if (!$update) {
    exit;
}

// index.php ga uzatish
require_once "index.php";
