<?php
include_once "../templates/header.php";
$query = "SELECT * FROM `users` WHERE id=".$_COOKIE['id'];
$temp = DB::fetch_array(DB::query($query));
if($temp['type'] != '0'){
    exit;
}
?>
<link rel = "stylesheet" href = "/styles/userlist.css">
<div class="content">
    <div class="c_container">
        <div class="tabl">
            <h1 class="tablename">Список пользователей</h1>
        <table class="list">
            <div class="longstr">
                <tr>
                    <td>id</td>
                    <td>Login</td>
                    <td>Username</td>
                    <td>User type</td>
                    <td>avatars</td>
                    <td>avatar's name</td>
                    <td>Tools</td>
                </tr>
            </div>


        <?php
        $query = "SELECT * FROM `users`";
        $res = DB::query($query);
        while( ($item = DB::fetch_array($res)) != false) {
            ?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=$item['login']?></td>
                <td><?=$item['username']?></td>
                <td><?=$item['type']?></td>
                <td><img src="<?=$item['avatar_name']?>" class="avatarimg" alt="Аватарка"></td>
                <td><?=$item['avatar_name']?></td>
                <td>
<!--                    <form action="/admin/edituser.php" method="post" enctype="multipart/form-data">-->
<!--                        <input type="hidden" name="id" value="--><?//=$item['id']?><!--">-->
<!--                    </form>-->
                    <a href="/admin/edituser.php?id=<?=$item['id']?>"><img class="icons" src="/images/svg/edit.svg" title="Редактировать"></a>
                    <a href="/admin/deleteuser.php?id=<?=$item['id']?>"><img class="icons" src="/images/svg/remove.svg" title="Удалить"></a>
                </td>
            </tr>
            <?php
        }
        ?>
        </table>
        </div>
    </div>
</div>
</body>
</html>

