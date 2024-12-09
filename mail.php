<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання значень з форми з перевіркою на порожні значення
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $request = isset($_POST['request']) ? htmlspecialchars($_POST['request']) : '';
    $details = isset($_POST['details']) ? htmlspecialchars($_POST['details']) : '';

    // Перевірка, чи не порожні значення
    if (empty($name) || empty($phone) || empty($request)) {
        echo "<script>alert('Будь ласка, заповніть усі обов\'язкові поля!');</script>";
        exit();
    }
    
    $to = "archilbigvava@gmail.com";  // Ваша пошта
    $subject = "Нова заявка на консультацію";

    // Тіло листа
    $message = "
    <html>
    <head>
        <title>Нова заявка на консультацію</title>
    </head>
    <body>
        <h2>Деталі заявки</h2>
        <p><strong>Ім'я:</strong> $name</p>
        <p><strong>Телефон:</strong> $phone</p>
        <p><strong>Запит:</strong> $request</p>
        <p><strong>Деталі запиту:</strong></p>
        <p>$details</p>
    </body>
    </html>
    ";

    // Заголовки
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@yourdomain.com" . "\r\n";  // Укажите свой email в From

    // Відправка листа
    if (mail($to, $subject, $message, $headers)) {
        // Перенаправлення на сторінку message.html після успішної відправки
        echo "<script>window.location.href = 'message.html';</script>";
        exit();
    } else {
        // Якщо лист не надіслано, відобразити повідомлення про помилку
        echo "<script>alert('Сталася помилка при відправці! Спробуйте ще раз.');</script>";
    }
}
?>
