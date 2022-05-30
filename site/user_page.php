<?php include_once "templates/header.php";
$query = "SELECT * FROM `users` WHERE id=".$_COOKIE['id'];
$item = DB::fetch_array(DB::query($query));
if($item['type'] != '0'){
    $isadmin = 'не ';
}
?>
<link rel = "stylesheet" href = "/styles/user_page.css">
<div class="content">
    <div class="c_container">

        <div class="right">
            <div class="buttonss" id="boxes">
                <a class="button" id="buttonex" href="../exit.php">Выход</a>
                <a class="button" id="buttonred" href="../admin/edituser.php?id=<?=$item['id']?>">Редактировать</a>
                <a class="button" id="buttondel" href="../admin/deleteuser.php?id=<?=$item['id']?>">Удалить</a>
                <?php
                if($item['type'] == '0'){
                    if(!isset($_SESSION['auth'])) {
                        exit;
                    }else{?>
                    <a class="button" id="buttondel" href="admin/userlist.php">Редактировать пользователей</a>
                <? }
                }?>
            </div>

            <div class="avatar" id="aboxes">
                <img class="photos" src="..<?echo $item['avatar_name']?>">
            </div>
        </div>

        <div class="info-box" id="boxes">
            <p class="text_content">Ваше имя: <?=($item['username']);?><br>
                Ваш логин: <?=($item['login']);?><br>
                Вы <?=$isadmin?>администратор<br>
            </p>
        </div>
    </div>
</div>
</body>
</html>
