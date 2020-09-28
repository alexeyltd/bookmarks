<?php
// $encryptEmail = openssl_encrypt($data['login'], "AES-256-CTR", $keyAES);
$encryptEmail = base64_encode(openssl_encrypt($data['login'], "AES-128-CTR", $keyAES));

$to = $data['login'];
$subject = 'Verification email';
$message = '
For verification email click this <a href="http://'.$domain.'/confirm-email?code='.$encryptEmail.'" target="_blank">link</a>
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