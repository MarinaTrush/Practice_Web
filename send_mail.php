<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "phpmailer/src/Exception.php";
    require "phpmailer/src/PHPMailer.php";

    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";
    $mail->setLanguage('uk', 'phpmailer/language/');
    $mail->IsHTML(true);

    $mail->setFrom($email);
    $mail->addAddress("trush.marina.13@gmail.com");
    $mail->Subject = "Відгук";

    $rating_value = '1';
    if ($_POST['rating_value'] == '2'){
      $rating_value = '2';
    }
    if ($_POST['rating_value'] == '3'){
      $rating_value = '3';
    }
    if ($_POST['rating_value'] == '4'){
      $rating_value = '4';
    }
    if ($_POST['rating_value'] == '5'){
      $rating_value = '5';
    }

    $body = '<h1>Відгук</h1>';
    if(trim(!empty($_POST['name']))){
      $body.="<p><strong>Прізвище та ім'я:</strong> ".$_POST['name']."</p>";
    }
    if(trim(!empty($_POST['email']))){
      $body.="<p><strong>E-mail:</strong> ".$_POST['email']."</p>";
    }
    if(trim(!empty($_POST['rating_value']))){
      $body.="<p><strong>Кількість зірок:</strong> ".$_POST['rating_value']."</p>";
    }
    if(trim(!empty($_POST['message']))){
      $body.="<p><strong>Повідомлення:</strong> ".$_POST['message']."</p>";
    }

    $mail->Body = $body;

    //Відправка
    if (!$mail->send()) {
      $message = 'Помилка';
    } else {
      $message = 'Дані відправлені!';
    }
    $response = ['message'=> $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>