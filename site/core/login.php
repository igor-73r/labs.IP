<?php
include_once "db.php";
DB::getInstance();

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $llogin = htmlspecialchars($_POST['user_login']);
    $pass = htmlspecialchars($_POST['user_password']);
    $error = '';

    if (empty($llogin) || empty($pass)) {
        $error = 'Ошибка авторизации, поля не должны быть пустыми!';
    }

    if (empty($error)) {
        $query = "SELECT * FROM `users` WHERE `login` = '$llogin' and `password` = MD5('$pass')";
        $res = DB::query($query);
        if(($item = DB::fetch_array($res)) != false) {
            $_SESSION['auth'] = true;
            $_SESSION['name'] = $item['username'];
            setcookie('id', $item['id'], 0, "/");
            header('location: /');
        }else{
            $error = 'Неверное имя пользователя или пароль';
        }
    }
    include_once "../reg_log.php";
}