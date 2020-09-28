<?php
$to = $data['login'];
$subject = 'Forgot Password';
$message = '
Your new password: '.$newPassword.'
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
?>