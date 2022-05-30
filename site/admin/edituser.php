<?php
include_once "../templates/header.php";
$temp = DB::fetch_array(DB::query("SELECT * FROM `users` WHERE id=".$_COOKIE['id']));
if($_COOKIE['id'] != $_GET['id'] && $temp['type'] != '0'){
    exit;
}
?>
<div class="content">
    <div class="c_container">
        <link rel = "stylesheet" href = "/styles/edituser.css">
            <?php

            $query = "SELECT * FROM `users` WHERE id=".($_GET['id'] == null ? $_POST['id'] : $_GET['id']);
            $res = DB::query($query);
            if( ($item = DB::fetch_array($res)) != false) {
                ?>
                <div class="redaction" id="red_box">
                    <h1>Редактирование пользователя</h1>
                    <?php if(isset($error) && !empty($error)){?>
                        <div id="er_boxes"><p class="text_content"><?=$error?></p></div><?php
                    }?>
                    <?php if (!isset($error) || (isset($error) && !empty($error))){?>
                        <form action="/admin/updateuser.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?=$item['id']?>">
                            <table>
                                <tr>
                                    <td>Новый логин</td>
                                    <td><input type="text" name="login" value="<?=$item['login']?>" REQUIRED/></td>
                                </tr>
                                <tr>
                                    <td>Новое имя</td>
                                    <td><input type="text" name="username" value="<?=$item['username']?>"/></td>
                                </tr>
                                <tr>
                                    <td>Новый пароль</td>
                                    <td><input type="password" name="pass1"/></td>
                                </tr>
                                <tr>
                                    <td>Пароль повторно</td>
                                    <td><input type="password" name="pass2"/></td>
                                </tr>
                                <tr>
                                    <td>Аватар (изменить/удалить)</td>
                                    <td>
                                        <input type="file" name="user_avatar"/>
                                        <label for="isRemove">Удалить аватар</label><input type="checkbox" name="isRemove" value="true">
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" value="Изменить" />
                        </form>
                    <?}?>
                </div>
                <?php
            }
            ?>
    </div>
</div>
</table>

</body>
</html>

