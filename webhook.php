<?php
// إعدادات البوت
$bot_token = '7806251613:AAHOh8z1xsX0lpVGrxGrNwrIGJi4z6fNkzU';
$webapp_url = 'https://tele.hlm.one/user-info.html'; // رابط صفحة WebApp

// استقبال البيانات من Telegram
$content = file_get_contents("php://input");
$update = json_decode($content, true);

// تحقق من وجود رسالة
if (!isset($update["message"])) {
    exit;
}

$chat_id = $update["message"]["chat"]["id"];
$text = $update["message"]["text"] ?? '';

// إذا كانت الرسالة /start
if ($text === "/start") {
    // 1. رسالة ترحيب
    sendMessage($chat_id, "👋 أهلاً بك! هذا هو التطبيق التجريبي الخاص بنا.");

    // 2. إرسال زر WebApp داخل inline keyboard (لكي يمرر معلومات المستخدم)
    sendMessage($chat_id, "✅ اضغط الزر لفتح التطبيق:", [
        'inline_keyboard' => [[
            ['text' => '🚀 فتح التطبيق', 'web_app' => ['url' => $webapp_url]]
        ]]
    ]);
}

// دالة إرسال رسالة
function sendMessage($chat_id, $text, $reply_markup = null) {
    global $bot_token;

    $url = "https://api.telegram.org/bot$bot_token/sendMessage";

    $data = [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => 'HTML'
    ];

    if ($reply_markup) {
        $data['reply_markup'] = json_encode(['inline_keyboard' => $reply_markup['inline_keyboard']]);
    }

    file_get_contents($url . "?" . http_build_query($data));
}
