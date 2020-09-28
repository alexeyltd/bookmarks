<?php
require 'templates/header.php';
$email = openssl_decrypt(base64_decode($_GET['code']), "AES-128-CTR", $keyAES);

$checkmail = R::findOne('users', 'login = ?', [$email]);
if($checkmail)
{
    $confirm = R::load('users', $checkmail->id);
    $confirm->confirm_email = 1;
    R::store($confirm);
    echo '<script>location.replace("login");</script>';
}
else
{
    echo 'Ошибка';
}