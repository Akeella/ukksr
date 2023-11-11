<?php 

//Подключаем библиотеку отправки письма
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';


$mail = new PHPMailer();
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$message = $_POST['user_message'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Host = 'ssl://smtp.mail.ru';  						 // Specify main and backup SMTP servers
$mail->Port = 465;                                     // TCP port to connect to / этот порт может отличаться у других провайдеров
$mail->Username = 'kupravlyayushchaya@mail.ru';        // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'gxFn7QdF1nCcA4syeehX';              // PpupftOT17(C                   // Ваш пароль от почты с которой будут отправляться письма


$mail->setFrom('kupravlyayushchaya@mail.ru');          // от кого будет уходить письмо?
$mail->addAddress('eser7575@mail.ru');                 // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с тестового сайта';
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email. '<br>Текст сообщения ' .$message;
$mail->AltBody = '';

if(!$mail->send()) {
   echo 'Error';
} else {
   header('Location: /?m=Сообщение%20успешно%20отправленно');
}
?>
