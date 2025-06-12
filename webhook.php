<?php
//https://api.telegram.org/bot7806251613:AAHOh8z1xsX0lpVGrxGrNwrIGJi4z6fNkzU/setWebhook?url=https://tele.hlm.one/webhook.php
// ملف webhook.php
$bot_token = '7806251613:AAHOh8z1xsX0lpVGrxGrNwrIGJi4z6fNkzU'; // ← ضع توكن البوت هنا
$webapp_url = 'https://tele.hlm.one/user-info.html'; // ← رابط الصفحة

$content = file_get_contents("php://input");
$update = json_decode($content, true);

if (!isset($update["message"])) {
    exit;
}

$chat_id = $update["message"]["chat"]["id"];
$text = $update["message"]["text"];

// التحقق من أمر /start
if ($text === "/start") {
    // إرسال رسالة ترحيبية
    sendMessage($chat_id, "👋 مرحباً بك في البوت الخاص بنا!");

    // إرسال زر WebApp داخل Reply Keyboard
    // sendMessage($chat_id, "✅ اضغط على الزر أدناه لفتح التطبيق", [
    //     'keyboard' => [[
    //         ['text' => 'فتح التطبيق 🚀', 'web_app' => ['url' => $webapp_url]]
    //     ]],
    //     'resize_keyboard' => true,
    //     'one_time_keyboard' => false
    // ]);
    sendMessage($chat_id, "✅ اضغط على الزر أدناه لفتح التطبيق:", [
        'reply_markup' => [
            'inline_keyboard' => [[
                ['text' => '🚀 فتح التطبيق', 'web_app' => ['url' => $webapp_url]]
            ]]
        ]
    ]);
}

// دالة إرسال رسالة
function sendMessage($chat_id, $text, $reply_markup = null)
{
    global $bot_token;

    $url = "https://api.telegram.org/bot$bot_token/sendMessage";

    $data = [
        'chat_id' => $chat_id,
        'text' => $text
    ];

    if ($reply_markup) {
        $data['reply_markup'] = json_encode($reply_markup);
    }

    file_get_contents($url . "?" . http_build_query($data));
}
