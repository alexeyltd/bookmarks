<?php
$data = $_POST;
$errorMsg = '';
$successMsg = '';

/**
 * @Main("/")
 */
if (empty($token) && !in_array($_SERVER['PHP_SELF'], ['/login.php', '/signup.php', '/forgot-password.php', '/verify.php', '/confirm-email.php', '/profile.php', '/public-collection.php', '/api.php']))
{
    header('Location: /login');
}
elseif (!empty($token) && in_array($_SERVER['PHP_SELF'], ['/login.php', '/signup.php', '/forgot-password.php', '/verify.php', '/confirm-email.php']))
{
    header('Location: /');
}

/**
 * @Signup("/signup", methods={"POST"})
 */
if(isset($_POST['signup']))
{
    if(mb_strlen($data['login']) < 7 ||  mb_strlen( $data['login']) > 100)
	{ $errorMsg = 'Ошибка. Почта должна содержать не менее 7 символов'; }
    
    elseif(mb_strlen( $data['password']) < 6 ||  mb_strlen( $data['password']) > 100)
	{ $errorMsg = 'Ошибка. Пароль должен содержать не менее 6-ти символов'; }
	
// 	elseif (preg_match('/[<>]/', $data['login']) || preg_match('/[<>]/', $data['password']))
// 	{ $errorMsg = 'Ошибка. Определён XSS. Введите корректные данные'; }
    
    // elseif($_POST['password_2'] != $data['password'])
    // { $errorMsg = 'Повторный пароль введен не верно'; }
    
    elseif(R::count('users', "login = ?", array($data['login'])) > 0)
    { $errorMsg = 'Пользователь с таким логином уже существует'; }
    
	else
	{
        $signup = R::dispense('users');
        
		$signup->login = $data['login'];
		$signup->password = password_hash($data['password'], PASSWORD_DEFAULT);
		$signup->role = "user";
		$signup->confirm_email = 0;
		$signup->name = "";
		$signup->description = "";
		$signup->url = "";
		$signup->avatar = "";
		$signup->phone = "";
	    $signup->tariff = "free";
	    $signup->subscribe = date("Y-m-d");
//	    $signup->subscribe = date("Y-m-d", strtotime('+14 day'));
		$signup->lastlogin = date("Y-m-d H:i");
		$signup->datereg = date("Y-m-d");
		$signup->ban = 0;
        $signup->e_time = '17:00';
		$signup->e_monday = 1;
        $signup->e_tuesday = 1;
        $signup->e_wednesday = 1;
        $signup->e_thursday = 1;
        $signup->e_friday = 1;
        $signup->e_saturday = 1;
        $signup->e_sunday = 1;
        
        R::store($signup);
        
        $collection = R::dispense('collections');
        
        $collection->title = 'Default';
        $collection->color = '#FFFBDF';
        $collection->is_public = 0;
        $collection->author_id = R::count('users');
        $collection->dateutc = date("Y-m-d H:i");
        
        R::store($collection);
        
        // $emailDomain = substr(strrchr($data['login'], '@'), 1);
        require 'mail/confirm-email.php';
        
        header("Location: verify?mail=" . $data['login']);
	}
}

/**
 * @Resend-Email("/verify", methods={"POST"})
 */
if ( isset($data['resend-email']) )
{
    require 'mail/confirm-email.php';
    
    $successMsg = 'Повторное письмо отправлено';
}

/**
 * @Login("/login", methods={"POST"})
 */
if ( isset($data['signin']) )
{
    $user = R::findOne('users', 'login = ?', array($data['login']));
	if ($user) // если логин зарегистрирован
	{
		if (password_verify($data['password'], $user->password)) // если пароль совпадает
		{
	    	if($user->confirm_email == true) // если почта подтверждена
            {
                $_SESSION['logged_user'] = $user;
                    			
                header("Location: /");
            }
		    else
		    {
			    header("Location: verify?mail=" . $user->login);
		    }
		}
		else
		{
			$errorMsg = 'Логин и/или пароль не совпадают';
		}
	}
	else
	{
		$errorMsg = 'Логин и/или пароль не совпадают';
	}
}

/**
 * @Logout(methods={"POST"})
 */
if(isset($data['logout']))
{
	unset($_SESSION['logged_user']);
	header("Location: /");
}

/**
 * @Forgot-password(methods={"POST"})
 */
if(isset($data['forgot-password']))
{
    $newPassword = uniqid();
    
    $findUser = R::findOne('users', 'login = ?', [$data['login']]);
    if($findUser)
    {
        $user = R::load('users', $findUser->id);
        
        $user->password = password_hash($newPassword, PASSWORD_DEFAULT);
        
        R::store($user);
        
        require 'mail/forgot-password.php';
        
        $successMsg = 'Мы отправили вам новый пароль на почту';
    }
    else
    {
        $errorMsg = 'Такого юзера не существует';
    }
}

/**
 * @Add-bookmark(methods={"POST"})
 */
if(isset($data['add-bookmark']))
{
    $pq = phpQuery::newDocument(file_get_contents($data['link']));

    # Title
    $parceTitle = $pq->find('title');
    $query['title'] = pq($parceTitle)->text();

    # Description
    $parceDesc = $pq->find('head meta[name="description"]');
    $query['description'] = pq($parceDesc)->attr('content');

    if(empty($query['description']))
    {
        $parceDesc = $pq->find('head meta[property="og:description"]');
        $query['description'] = pq($parceDesc)->attr('content');
    }

    # URL
    $parceURL = $pq->find('head meta[property="og:url"]');
    $query['url'] = pq($parceURL)->attr('content');

    # Image
    $parceIcon = $pq->find('head meta[property="og:image"]');
    $query['image'] = pq($parceIcon)->attr('content');

}

/**
 * @Save-bookmark(methods={"POST"})
 */
if(isset($data['save-bookmark']))
{
    if(count($bookmarks) >= 7 && $token->tariff == 'free')
    {
        $errorMsg = 'open pop-up';
    }
    else
    {
        $bookmark = R::dispense('bookmarks');

        $bookmark->name = $data['name'];
        $bookmark->description = $data['description'];
        $bookmark->image = $data['image'];
        $bookmark->link = $data['link'];

        if(!empty($data['collection']))
        {
            $bookmark->collection_id = $data['collection'];
        }
        else
        {
            $bookmark->collection_id = 0;
        }

        $bookmark->is_sending = 0;
        $bookmark->author_id = $token->id;
        $bookmark->dateutc = date("Y-m-d H:i");

        R::store($bookmark);

        header("Location: /");
    }
}

/**
 * @Delete-bookmark(methods={"POST"})
 */
if(isset($data['delete-bookmark']))
{
    $bookmark = R::load('bookmarks', $data['link']);
    
    R::trash($bookmark);
    
    header("Location: /");
}

/**
 * @Change-collection(methods={"POST"})
 */
if(isset($data['change-collection']))
{
    $bookmark = R::load('bookmarks', $data['bookmark']);
    
    $bookmark->collection_id = $data['collection'];
    
    R::store($bookmark);
    
    header("Location: " . $_SERVER['REQUEST_URI']);
}

/**
 * @Add-collection(methods={"POST"})
 */
if(isset($data['add-collection']))
{
    if(count($collections) >= 3 && $token->tariff == 'free')
    {
        $errorMsg = 'open pop-up';
    }
    else
    {
        $collection = R::dispense('collections');

        $collection->title = $data['title'];
        if ($data['is_public'] == 'on') {
            $collection->is_public = true;
        } else {
            $collection->is_public = false;
        }
        $collection->color = $data['color'];
        $collection->author_id = $token->id;
        $collection->dateutc = date("Y-m-d H:i");

        R::store($collection);

        header("Location: " . $_SERVER['REQUEST_URI']);
    }
}

/**
 * @Edit-collection(methods={"POST"})
 */
if(isset($data['edit-collection']))
{
    $collection = R::load('collections', $_GET['id']);
    
    $collection->title = $data['title'];
    if($data['is_public'] == 'on')
    {
        $collection->is_public = true;
    }
    else
    {
         $collection->is_public = false;
    }
    $collection->color = $data['color'];
    $collection->author_id = $token->id;
    $collection->dateutc = date("Y-m-d H:i");
    
    R::store($collection);
    
    header("Location: " . $_SERVER['REQUEST_URI']);
}

/**
 * @Delete-collection(methods={"POST"})
 */
if(isset($data['delete-collection']))
{
    $findBookmarks = R::findAll('bookmarks', 'collection_id = ?', [$_GET['id']]);
    foreach ($findBookmarks as $bookmark)
    {
        $findBookmark = R::load('bookmarks', $bookmark->id);
        $findBookmark->collection_id = 0;
        R::store($findBookmark);
    }

//    $collection = R::load('collections', $_GET['id']);
//
//    R::trash($collection);
//
//    header("Location: collections");
}

/**
 * @Subscribe(methods={"POST"})
 */
if(isset($data['subscribe']))
{
    $checkSubscribe = R::findOne('subscribe', 'user = ?', [$data['email']]);

    if(empty($checkSubscribe))
    {
        $subscribe = R::dispense('subscribe');
        $subscribe->user = $data['email'];
        $subscribe->subscription_id = $_GET['id'];
        
        R::store($subscribe);
        
        header("Location: profile?id=" . $_GET['id'] . '&result=success');
        // header("Location: " . $_SERVER['REQUEST_URI'] . '&result=success');
    }
    
    else
    {
        header("Location: profile?id=" . $_GET['id'] . '&result=signed');
        // header("Location: " . $_SERVER['REQUEST_URI'] . '&result=signed');
    }
}

/**
 * @Unsubscribe(methods={"POST"})
 */
if(isset($data['unsubscribe']))
{
        $unsubscribe = R::load('subscribe', $data['sub_id']);
        
        R::trash($unsubscribe);
        
        header("Location: profile?id=" . $_GET['id'] . '&result=unsubscribe');
        // header("Location: " . $_SERVER['REQUEST_URI'] . '&result=unsubscribe');
}

/**
 * @Edit-profile(methods={"POST"})
 */
if(isset($data['edit-profile']))
{
    $edit = R::load('users', $token->id);
    
    $edit->name = $data['name'];
    $edit->login = $data['login'];
    $edit->url = $data['url'];
    
    R::store($edit);

    header("Location: " . $_SERVER['REQUEST_URI']);
}

/**
 * @Suggest-feature(methods={"POST"})
 */
if(isset($data['contact']))
{
    require 'mail/contact.php';

    $successMsg = 'Your message successfully sending';
}

/**
 * @Email-settings(methods={"POST"})
 */
if(isset($data['email-settings']))
{
    $email = R::load('users', $token->id);

    $email->e_time = $data['time'];

    if(!empty($data['e_monday'])) { $email->e_monday = true; } else { $email->e_monday = false; }
    if(!empty($data['e_tuesday'])) { $email->e_tuesday = true; } else { $email->e_tuesday = false; }
    if(!empty($data['e_wednesday'])) { $email->e_wednesday = true; } else { $email->e_wednesday = false; }
    if(!empty($data['e_thursday'])) { $email->e_thursday = true; } else { $email->e_thursday = false; }
    if(!empty($data['e_friday'])) { $email->e_friday = true; } else { $email->e_friday = false; }
    if(!empty($data['e_saturday'])) { $email->e_saturday = true; } else { $email->e_saturday = false; }
    if(!empty($data['e_sunday'])) { $email->e_sunday = true; } else { $email->e_sunday = false; }

    R::store($email);

    header("Location: " . $_SERVER['REQUEST_URI']);
}

/**
 * @TimeZone()
 */
class Time
{
    public function timezone($token)
    {
        switch ($token->e_time) {
            case '00:00':
                echo "00 AM";
                break;
            case '01:00':
                echo "1 AM";
                break;
            case '02:00':
                echo "2 AM";
                break;
            case '03:00':
                echo "3 AM";
                break;
            case '04:00':
                echo "4 AM";
                break;
            case '05:00':
                echo "5 AM";
                break;
            case '06:00':
                echo "6 AM";
                break;
            case '07:00':
                echo "7 AM";
                break;
            case '08:00':
                echo "8 AM";
                break;
            case '09:00':
                echo "9 AM";
                break;
            case '10:00':
                echo "10 AM";
                break;
            case '11:00':
                echo "11 AM";
                break;
            case '12:00':
                echo "12 AM";
                break;
            case '13:00':
                echo "1 PM";
                break;
            case '14:00':
                echo "2 PM";
                break;
            case '15:00':
                echo "3 PM";
                break;
            case '16:00':
                echo "4 PM";
                break;
            case '17:00':
                echo "5 PM";
                break;
            case '18:00':
                echo "6 PM";
                break;
            case '19:00':
                echo "7 PM";
                break;
            case '20:00':
                echo "8 PM";
                break;
            case '21:00':
                echo "9 PM";
                break;
            case '22:00':
                echo "10 PM";
                break;
            case '23:00':
                echo "11 PM";
                break;
        }
    }
}



/**
 * @Login("/api", methods={"POST"})
 */
//if ( isset($data['signin']) )
//{

//    $user = R::findOne('users', 'login = ?', array($data['login']));
//    if ($user) // если логин зарегистрирован
//    {
//        if (password_verify($data['password'], $user->password)) // если пароль совпадает
//        {
//            if($user->confirm_email == true) // если почта подтверждена
//            {
//                $_SESSION['logged_user'] = $user;
//
//                header("Location: /");
//            }
//            else
//            {
//                header("Location: verify?mail=" . $user->login);
//            }
//        }
//        else
//        {
//            $errorMsg = 'Логин и/или пароль не совпадают';
//        }
//    }
//    else
//    {
//        $errorMsg = 'Логин и/или пароль не совпадают';
//    }
//}




