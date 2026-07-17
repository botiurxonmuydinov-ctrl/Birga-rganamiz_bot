<?php

function sendMessage($chat_id, $text, $keyboard = null)
{
    $data = [
        "chat_id" => $chat_id,
        "text" => $text,
        "parse_mode" => "HTML"
    ];

    if ($keyboard != null) {
        $data["reply_markup"] = json_encode($keyboard);
    }

    file_get_contents(API_URL . "sendMessage?" . http_build_query($data));
}

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
    "resize_keyboard" => true,
    "one_time_keyboard" => false
];

sendMessage(
    $chat_id,
    "🇰🇷 <b>Koreys tilini o'rganish botiga xush kelibsiz!</b>\n\nQuyidagi menyudan kerakli bo'limni tanlang.",
    $keyboard
);
