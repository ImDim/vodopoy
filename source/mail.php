<?php

    $file = 'registration.txt';
    $response = [];

    if (file_exists($file)) {
        $content = file_get_contents($file);
    } else {
        $content = '';
    }

    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $socials = htmlspecialchars(trim($_POST['socials']));
    $date = date('d.m.Y H:i:s');

    if (substr_count($file, $email) > 0) {
        $response['status'] = 'fail';
        $response['error'] = 'Данный email уже зарегистрирован!';
    }

    if (!$name || !$email || !$socials) {
        $response['status'] = 'fail';
        $response['error'] = 'Заполните все поля!';
    }

    $user = " 
    ------------------------
    Name: $name 
    Email: $email
    Socials: $socials
    Data: $date
    ------------------------";

    $content .= $user;

    function sendEmail() {
        $recepient = "soulmatesneverdie92@gmail.com";
        $sitename = "ВОДОПОЙ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: ВОДОПОЙ' . "\r\n";

        $message = "Имя: $name \nEmail: $email \nСоциалка: $socials";

        $pagetitle = "Регистрация на ВОДОПОЙ";
        // More headers

        mail($recepient, $pagetitle, $message, $headers);

        $body = file_get_contents('mail.html');

        mail($email, $pagetitle, $body, $headers);
    }

    if ($response['status'] === 'fail') {
        exit(json_encode($response));
    } else {
        $response['status'] = 'ok';
        file_put_contents($file, $content);
        sendEmail();
        echo(json_encode($response));
    }
?>