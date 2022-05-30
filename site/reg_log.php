<?php include_once "templates/header.php"?>

<link rel = "stylesheet" href = "/styles/reg_log.css">

<div class="content">
    <div class="c_container">

        <?php if(isset($error) && !empty($error)){?>
            <div id="er_boxes"><p class="text_content"><?=$error?></p></div><?php
        }?>
        <?php if (!isset($error) || (isset($error) && !empty($error))){?>
            <div class="register" id="boxes">
                <form action="../core/user.php" method="post" enctype="multipart/form-data">
                    <p class="text_content">Register</p>
                    <div class="reg_box">
                        <input class="t_arr_rb" type="text" name="new_user_login" placeholder="login" value="<?=$login?>" required>
                        <input class="t_arr_rb" type="text" name="new_username" placeholder="username" value="<?=$username?>" required>
                        <input class="t_arr_rb" type="password" name="new_user_password" placeholder="password" value required>
                        <input class="t_arr_rb" type="password" name="new_user_repeat_password" placeholder="repeat password" value required>
                        <input type="file" name="user_avatar"/>
                        <input class="button" type="submit" value="Зарегистрироваться">
                    </div>
                </form>
            </div>
        <?php } else if(empty($error)){?>
            <div id="boxes"><p class="text_content">Вы успешно зарегистрированы!</p></div><?php
        }?>


            <div class="login" id="boxes">
                <form action="../core/login.php" method="post" enctype="multipart/form-data">
                        <p class="text_content">Log in</p>
                        <div class="login_box">
                            <input class="t_arr_lb" type="text" name="user_login" placeholder="login" value>
                            <input class="t_arr_lb" type="password" name="user_password" placeholder="password" value>
                            <input class="button" type="submit" value="Войти">
                        </div>
                </form>
            </div>
    </div>
</div>
</body>
</html>