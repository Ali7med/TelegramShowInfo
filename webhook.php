<?php
// إعدادات البوت
$bot_token = '7806251613:AAHOh8z1xsX0lpVGrxGrNwrIGJi4z6fNkzU';
$webapp_url = 'https://tele.hlm.one/user-info.html'; // رابط صفحة WebApp

// استقبال التحديث من Telegram
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
    // 1. إرسال رسالة ترحيب
    sendMessage($chat_id, "👋 مرحباً بك في البوت التجريبي!");

    // 2. إرسال زر WebApp كـ Inline Keyboard (أفضل تجربة لفتح التطبيق مباشرة)
    sendMessage($chat_id, "🚀 اضغط على الزر أدناه لفتح التطبيق:", [
        'inline_keyboard' => [[
            ['text' => 'فتح التطبيق الآن 🌐', 'web_app' => ['url' => $webapp_url]]
        ]]
    ]);

    // 3. تعيين زر دائم في أسفل البوت (menu_button)
    setPersistentWebAppButton($bot_token, $webapp_url);
}

// ===== دالة لإرسال رسالة =====
function sendMessage($chat_id, $text, $reply_markup = null) {
    global $bot_token;

    $url = "https://api.telegram.org/bot$bot_token/sendMessage";

    $data = [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => 'HTML'
    ];

    if ($reply_markup) {
        $data['reply_markup'] = json_encode($reply_markup);
    }

    file_get_contents($url . "?" . http_build_query($data));
}

// ===== دالة لإضافة زر دائم أسفل البوت =====
function setPersistentWebAppButton($token, $webapp_url) {
    $url = "https://api.telegram.org/bot$token/setChatMenuButton";

    $data = [
        'menu_button' => [
            'type' => 'web_app',
            'text' => 'فتح التطبيق 🌐',
            'web_app' => [
                'url' => $webapp_url
            ]
        ]
    ];

    file_get_contents($url . '?' . http_build_query([
        'menu_button' => json_encode($data['menu_button'])
    ]));
}
