<?php

$to = 'spam@smmrezka.ru';
$subject = 'Contact';
$message = '
Subject: '.$data['subject'].'<br/>
Message: '.$data['message'].'
';
$from = "From: noreply@$domain\r\n"
    ."Content-type: text/html; charset=utf-8\r\n"
    ."X-Mailer: PHP mail script";

mail(
    $to,
    $subject,
    $message,
    $from
);