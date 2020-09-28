<?php

require '/var/www/linkmarky/includes/model.php';
$allUsers = R::findAll('users');

$date = date_create(date("Y-m-d H:i:s"));
$day = date_format($date, 'l');
$timeNow = date("H:i");
echo '<br><br>';

$sql = 'SELECT * FROM users, bookmarks
        WHERE bookmarks.author_id = users.id
        AND bookmarks.is_sending = false';
$rows = R::getAll($sql);
$authors = R::convertToBeans('users',$rows);

    $to = 'spam@smmrezka.ru';
    $subject = 'Your bookmarks';
    $message = 'test';
    $from = "From: noreply@linkmarky.com\r\n"
        . "Content-type: text/html; charset=utf-8\r\n"
        . "X-Mailer: PHP mail script";
    mail(
        $to,
        $subject,
        $message,
        $from
    );


//usort($authors, function($a, $b) { return strcmp($a->login, $b->login); });
//
//foreach ($authors as $i => $author) {
//    if ($i === 0 || $authors[$i-1]->login !== $author->login) {
//        echo $author->login . '<br/>';
//    }
//    echo $author->name . '<br/><br/>';
//}

//$mail = '';
//foreach ($authors as $author) {
//    if ($mail == $author->login) {
//        echo $author->name;
//    } else {
//        echo $author->login . '<br/>' . $author->name . '<br/><br/>';
//        $mail = $author->login;
//    }
//}

//$groupedData = [];
//foreach ($authors as $author) {
//    $groupedData[$author->login][] = $author->name;
//}
//foreach ($groupedData as $login => $names) {
//    echo $login . '<br/>' . join('<br/>', $names) . '<br/><br/>';
//}









//foreach ($authors as $author) {
//    echo $author->login . '<br/>' . $author->name . '<br/><br/>';
//}

//foreach ($allUsers as $user) {
//    $noSendingBookmarks = R::findAll('bookmarks', 'author_id = ? AND is_sending = ?', [$user->id, false]);

//    if ($user->e_time == $timeNow) {
//        if (
//            $user->e_monday == true && $day == 'Monday' ||
//            $user->e_tuesday == true && $day == 'Tuesday' ||
//            $user->e_wednesday == true && $day == 'Wednesday' ||
//            $user->e_thursday == true && $day == 'Thursday' ||
//            $user->e_friday == true && $day == 'Friday' ||
//            $user->e_saturday == true && $day == 'Saturday' ||
//            $user->e_sunday == true && $day == 'Sunday'
//        ) {
//            $to = $user->login;
//            $subject = 'Your bookmarks';
//            foreach ($noSendingBookmarks as $bookmark) {
//                if ($bookmark->author_id == $user->id) {
//                    $message .= $bookmark->name . '<br/>';
//                }
//            }
//
//            $from = "From: noreply@linkmarky.com\r\n"
//                . "Content-type: text/html; charset=utf-8\r\n"
//                . "X-Mailer: PHP mail script";
//
//            if(!empty($noSendingBookmarks)) {
//                for ($i = 1; $i <= 1; $i++) {
//                mail(
//                    $to,
//                    $subject,
//                    $message,
//                    $from
//                );
//                    echo $i;
//                }
//                break;
//            }
//        }
//    }
//}


//foreach ($allUsers as $user)
//{
//    $to = $user->login;
//    $subject = 'Its test msg';
//    $message = 'Cron. You login: '.$user->login.' ';
//    $from = "From: noreply@linkmarky.com\r\n"
//        ."Content-type: text/html; charset=utf-8\r\n"
//        ."X-Mailer: PHP mail script";
//
//    mail(
//        $to,
//        $subject,
//        $message,
//        $from
//    );
//}

//            foreach ($bookmarks as $bookmark)
//            {
//                if($bookmark->author_id == $user->id)
//                {
//                    $toArchive = R::load('bookmarks', $bookmark->id);
//                    $toArchive->is_sending = true;
//                    R::store($toArchive);
//                }
//            }


//            echo $user->login . '<br/>';
//
//            foreach ($bookmarks as $bookmark)
//            {
//                if($bookmark->author_id == $user->id)
//                {
//                    $sub .= $bookmark->name . '<br/>';
//                    $toArchive = R::load('bookmarks', $bookmark->id);
//                    $toArchive->is_sending = true;
//                    R::store($toArchive);
//                }
//            }
//
//            echo $sub . '<br/>';
//
//            echo '<br/><br/>';

//    }




//foreach ($allUsers as $user)
//{
//    if($user->e_time == $timeNow)
//    {
//        if(
//            $user->e_monday == true    && $day == 'Monday'    ||
//            $user->e_tuesday == true   && $day == 'Tuesday'   ||
//            $user->e_wednesday == true && $day == 'Wednesday' ||
//            $user->e_thursday == true  && $day == 'Thursday'  ||
//            $user->e_friday == true    && $day == 'Friday'    ||
//            $user->e_saturday == true  && $day == 'Saturday'  ||
//            $user->e_sunday == true    && $day == 'Sunday'
//        )
//        {
//            echo $user->login . '<br><br>';
//
//            foreach ($bookmarks as $bookmark)
//            {
//                if($bookmark->author_id == $user->id)
//                {
//                    echo $bookmark->name . '<br/>';
//                    $toArchive = R::load('bookmarks', $bookmark->id);
//                    $toArchive->is_sending = true;
//                    R::store($toArchive);
//                }
//            }
//
//            echo '<br/><br/>';
//
//        }
//    }
//}