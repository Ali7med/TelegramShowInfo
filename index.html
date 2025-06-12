<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <title>Telegram WebApp + إرسال زر</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      direction: rtl;
      padding: 40px;
      background: linear-gradient(to right, #ece9e6, #ffffff);
      color: #333;
    }
    .container {
      max-width: 600px;
      margin: auto;
    }
    .box {
      background: #fff;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
      margin-bottom: 40px;
      transition: 0.3s ease;
    }
    .box:hover {
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
    }
    h2 {
      color: #0088cc;
      margin-bottom: 20px;
    }
    input {
      padding: 12px;
      width: 100%;
      margin: 8px 0 20px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
    }
    button {
      padding: 12px 25px;
      background-color: #0088cc;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover {
      background-color: #0077b6;
    }
    img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-bottom: 15px;
    }
    .info p {
      font-size: 16px;
      margin: 6px 0;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="box">
    <h2>1️⃣ إرسال زر WebApp</h2>
    <input type="text" id="chat_id" placeholder="أدخل chat_id للمستخدم">
    <input type="text" id="bot_token" placeholder="أدخل التوكن الخاص بالبوت">
    <input type="text" id="webapp_url" placeholder="رابط WebApp (مثلاً: https://yourdomain.com)">
    <button onclick="sendWebAppButton()">إرسال الزر الآن</button>
  </div>

  <div class="box">
    <h2>2️⃣ معلومات مستخدم التلغرام</h2>
    <div id="user-info">جاري التحميل...</div>
  </div>
</div>

<script>
  async function sendWebAppButton() {
    const chatId = document.getElementById("chat_id").value;
    const botToken = document.getElementById("bot_token").value;
    const webAppUrl = document.getElementById("webapp_url").value;

    const response = await fetch(`https://api.telegram.org/bot${botToken}/sendMessage`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        chat_id: chatId,
        text: "اضغط الزر لتجربة WebApp 👇",
        reply_markup: {
          inline_keyboard: [[
            { text: "افتح WebApp الآن", web_app: { url: webAppUrl } }
          ]]
        }
      })
    });

    const result = await response.json();
    alert(result.ok ? "تم إرسال الزر بنجاح!" : "خطأ: " + JSON.stringify(result));
  }

  window.onload = () => {
    if (window.Telegram && Telegram.WebApp) {
      Telegram.WebApp.ready();
      Telegram.WebApp.expand();
      const user = Telegram.WebApp.initDataUnsafe?.user;

      if (user) {
        document.getElementById("user-info").innerHTML = `
          <div class="info" style="text-align: center">
            <img src="https://t.me/i/userpic/320/${user.id}.jpg" alt="User Image" />
            <p><strong>الاسم:</strong> ${user.first_name} ${user.last_name || ''}</p>
            <p><strong>اسم المستخدم:</strong> @${user.username || 'غير متوفر'}</p>
            <p><strong>المعرف (ID):</strong> ${user.id}</p>
            <p><strong>اللغة:</strong> ${user.language_code}</p>
          </div>`;
      } else {
        document.getElementById("user-info").innerHTML = "❌ لم يتم العثور على معلومات مستخدم. يجب فتح الصفحة من داخل Telegram WebApp.";
      }
    } else {
      document.getElementById("user-info").innerHTML = "❌ هذه الصفحة يجب فتحها من داخل Telegram WebApp.";
    }
  }
</script>

</body>
</html>
