<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = htmlspecialchars($_POST['new_user_login']);
    $pass1 = htmlspecialchars($_POST['new_user_password']);
    $pass2 = htmlspecialchars($_POST['new_user_repeat_password']);
    $error = '';

    if (empty($login))
        $error .= 'Введите логин!<br>';
    if (empty($pass1))
        $error .= 'Введите пароль!<br>';
    if ($pass1 != $pass2)
        $error .= 'Пароли не совпадают!<br>';
    if (empty($error)){
        $_SESSION['auth'] = true;
        $_SESSION['name'] = $login;
    }

    include_once "../reg_log.php";
}