<?php

require_once "config.php";
require_once "database.php";

// Telegramdan kelgan ma'lumot
$update = json_decode(file_get_contents("php://input"), true);

// Agar ma'lumot kelmagan bo'lsa
if (!$update) {
    exit;
}

// Xabar ma'lumotlari
$message = $update['message'] ?? null;

if ($message) {

    $chat_id = $message['chat']['id'];
    $text = trim($message['text'] ?? '');

    // /start buyrug'i
    if ($text == "/start") {

        $keyboard = [
            "keyboard" => [
                [
                    ["text" => "📚 Darslar"],
                    ["text" => "📖 Lug'at"]
                ],
                [
                    ["text" => "📘 Grammatika"],
                    ["text" => "📝 Testlar"]
                ],
                [
                    ["text" => "💎 Premium"],
                    ["text" => "👤 Profil"]
                ],
                [
                    ["text" => "👨‍🏫 Ustoz bilan aloqa"],
                    ["text" => "👥 Jamoa"]
                ]
            ],
            "resize_keyboard" => true
        ];

        file_get_contents(API_URL . "sendMessage?" . http_build_query([
            "chat_id" => $chat_id,
            "text" => "🇰🇷 Koreys tili botiga xush kelibsiz!\n\nKerakli bo'limni tanlang.",
            "reply_markup" => json_encode($keyboard)
        ]));
    }
}
