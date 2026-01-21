<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    // إعداد SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    // ⚠️ ضع بريدك وكلمة مرور التطبيق
    $mail->Username = 'noun1234567@gmail.com';
    $mail->Password = 'APP_PASSWORD_HERE';

    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // المرسل والمستقبل
    $mail->setFrom('noun1234567@gmail.com', 'نظام الاختبارات');
    $mail->addAddress('noun1234567@gmail.com');

    // محتوى الرسالة
    $name = $_POST['student_name'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];

    $mail->isHTML(true);
    $mail->Subject = 'إجابات اختبار اللغة العربية';
    $mail->Body = "
    <h3>إجابات الطالب</h3>
    <p><strong>الاسم:</strong> $name</p>
    <p><strong>سؤال 1:</strong> $q1</p>
    <p><strong>سؤال 2:</strong> $q2</p>
    ";

    $mail->send();

    echo "
    <html dir='rtl'>
    <body style='font-family:Arial; text-align:center; padding:50px;'>
        <h2>✅ تم إرسال إجاباتك بنجاح</h2>
        <p>شكرًا لك</p>
    </body>
    </html>";

} catch (Exception $e) {
    echo "خطأ في الإرسال";
}
