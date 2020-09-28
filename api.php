<?php
header('Access-Control-Allow-Origin: *');
include_once('includes/model.php');

$data = file_get_contents("php://input");
$requestBody = json_decode($data, true);

$login = $requestBody['login'];
$password = $requestBody['password'];
$hash = $requestBody['hash'];
$url = $requestBody['url'];

$user = R::findOne('users', 'login = ?', array($login));

if($hash && $url)
{
    $save = R::dispense('bookmarks');
    $save->name = $requestBody['title'];
    $save->link = $requestBody['url'];
    $save->is_sending = false;
    $save->author_id = $hash;

    R::store($save);

//    $response = [
//        'message' => 'link success added',
//        'hash' => $user->id,
//        'status' => 'success'
//    ];
//    echo json_encode($response, true);
}
else
{
    if ($user->login == $login) // если логин зарегистрирован
    {
        if (password_verify($password, $user->password)) // если пароль совпадает
        {
            if ($user->confirm_email == true) // если почта подтверждена
            {
                $response = [
                    'message' => 'success',
                    'hash' => $user->id,
                    'status' => 'success'
                ];
                echo json_encode($response, true);
            } else {
                $response = [
                    'message' => 'error. email is not verified',
                    'hash' => '',
                    'status' => 'error'
                ];
                echo json_encode($response, true);
            }
        } else {
            $response = [
                'message' => 'error. login or password does not match',
                'hash' => '',
                'status' => 'error'
            ];
            echo json_encode($response, true);
        }
    } else {
        $response = [
            'message' => 'error. login or password does not match',
            'hash' => '',
            'status' => 'error'
        ];
        echo json_encode($response, true);
    }
}


