<?php
//define('PATH', $_SERVER['DOCUMENT_ROOT']);

include_once "db.php";
DB::getInstance();

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = htmlspecialchars($_POST['new_user_login']);
    $pass1 = htmlspecialchars($_POST['new_user_password']);
    $pass2 = htmlspecialchars($_POST['new_user_repeat_password']);
    $username = htmlspecialchars($_POST['new_username']);
    $error = '';

    $temp = "SELECT * FROM `users` WHERE `login` = '$login'";
    if((DB::fetch_array(DB::query($temp))) == true){
        $error = 'Такой пользователь уже зарегистрирован';
    }
    if (empty($login))
        $error .= 'Введите логин!<br>';
    if (empty($pass1))
        $error .= 'Введите пароль!<br>';
    if(strlen($pass1) > 32 || strlen($pass1) < 5){
        $error .= 'Длина пароля не должна привышать 32 символов и быть не меньше 5!<br>';
    }
    if(strlen($login) > 100){
        $error .= 'Длина логина не должна привышать 100 символов!<br>';
    }
    if ($pass1 != $pass2)
        $error .= 'Пароли не совпадают!<br>';

    if (($_FILES['user_avatar']['name']) != null) {
        $uploadTypeFile = "";
        if ($_FILES['user_avatar']['type'] = 'image/jpeg')
            $uploadTypeFile = ".jpg";

        $uploadNameFile = md5(time() . $_FILES['user_avatar']['name']);
        $uploadNameDirection = $_SERVER['DOCUMENT_ROOT'] . "/avatars/";

        $uploadAvatar = $uploadNameDirection . $uploadNameFile . $uploadTypeFile;
        if(!(move_uploaded_file($_FILES['user_avatar']['tmp_name'], $uploadAvatar))) {
            echo "Возможная атака с помощью файловой загрузки!\n";
            echo($_FILES['user_avatar']["name"]);
        }

        $strQueryAvatar = "/avatars/" . $uploadNameFile . $uploadTypeFile;
    }else{
        $strQueryAvatar = "/avatars/default.jpg";
    }

    if (empty($error)){
        $query = "INSERT INTO `users` (`login`, `username`, `password`, `avatar_name`)  VALUES ('$login', '$username', MD5('$pass1'), '$strQueryAvatar')";
        DB::query($query);
        $_SESSION['auth'] = true;
        $_SESSION['name'] = $username;
    }
    if($_SESSION['auth']) {
        $query = "SELECT * FROM `users` WHERE `login`= '$login'";
        $res = DB::query($query);
        if (($item = DB::fetch_array($res)) != false) {
            setcookie('id', $item['id'], 0, "/");
            header('location: /');
        }

    }

    include_once "../reg_log.php";
}?>

