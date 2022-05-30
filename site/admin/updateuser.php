<?php
include_once $_SERVER['DOCUMENT_ROOT']."../core/db.php";
DB::getInstance();

$error = "";

if(isset($_POST['pass1']) && !empty($_POST['pass1']) || isset($_POST['pass2']) && !empty($_POST['pass2'])){
    if(strlen($_POST['pass1']) > 32 || strlen($_POST['pass1']) < 5){
        $error .= 'Длина пароля не должна привышать 32 символов и быть не меньше 5!<br>';
    }
    if ($_POST['pass1'] != $_POST['pass2'])
        $error .= 'Пароли не совпадают!<br>';
}


if(isset($_POST['login']) && strlen($_POST['login']) > 100){
    $error .= 'Длина логина не должна привышать 100 символов!<br>';
}


if(empty($error)) {

    $strQueryPass = "";
    if (isset($_POST['pass2']) && !empty($_POST['pass2']))
        $strQueryPass = ", `password` = MD5(" . $_POST['pass2'] . ")";


    $isRemove = $_POST['isRemove'];
    if ($isRemove == true) {
        $strQueryAvatar = ", `avatar_name` = /avatars/default.jpg";
    } else {
        if (($_FILES['user_avatar']['name']) != null) {
            $uploadTypeFile = "";
            if ($_FILES['user_avatar']['type'] = 'image/jpeg')
                $uploadTypeFile = ".jpg";

            $uploadNameFile = md5(time() . $_FILES['user_avatar']['name']);
            $uploadNameDirection = $_SERVER['DOCUMENT_ROOT'] . "/avatars/";

            $uploadAvatar = $uploadNameDirection . $uploadNameFile . $uploadTypeFile;
            if (!(move_uploaded_file($_FILES['user_avatar']['tmp_name'], $uploadAvatar))) {
                echo "Возможная атака с помощью файловой загрузки!\n";
                echo($_FILES['user_avatar']["name"]);
            }

            $strQueryAvatar = ", `avatar_name` = '" . "/avatars/" . $uploadNameFile . $uploadTypeFile . "'";
        }
    }

    $query = "UPDATE `users` 
            SET `login`= '" . $_POST['login'] . "', `username` = '" . $_POST['username'] . "'"
             . $strQueryPass . $strQueryAvatar . "        
            WHERE id=" . $_POST['id'];
    $res = DB::query($query);

    header("location: /admin/userlist.php");
}
include_once "edituser.php";


