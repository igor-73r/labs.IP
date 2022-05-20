<?php session_start();?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Эппл точка ру</title>
    <link rel = "stylesheet" href = "/styles/style.css">
</head>
<body>

<div class="header">
    <div class="h_container">
        <nav class="hide">
            <a class="hiden" href="#"><img class="icon" src="../images/svg/menu.svg"></a>
            <ul class="submenu">
                <a class="button_link_h" href="../index.php">Main Page</a></li>
                <a class="button_link_h" href="../aboutme.php">About Me</a></li>
                <a class="button_link_h" href="../gallery.php">Gallery</a></li>
                <a class="button_link_h" href="../playthegame.php">Play The Game</a></li>
                <a class="button_link_h" href="../myworks.php">My Works</a></li>
                <a class="button_link_h" href="../mycat.php">мой кот :3</a></li>
            </ul>
        </nav>

        <div class="buttons">
            <a class="button_link" href="../index.php">Main Page</a>
            <a class="button_link" href="../aboutme.php">About Me</a>
            <a class="button_link" href="../gallery.php">Gallery</a>
            <a class="button_link" href="../playthegame.php">Play The Game</a>
            <a class="button_link" href="../myworks.php">My Works</a>
            <a class="button_link" href="../mycat.php">мой кот :3</a>
        </div>


        <?php if (isset($_SESSION['auth'])){?>
                <a class="reg_log" id="reg_log" href="../#"><?="Пользователь: " . $_SESSION['name'];?></a>
<!--                echo "Пользователь: " . $_SESSION['name'];-->
           <? }else{?>
                <div class="reg_log">
                    <a class="reg_log" id="reg_log" href="../reg_log.php">Register | Login</a>
                </div>
            <? } ?>

    </div>
</div>