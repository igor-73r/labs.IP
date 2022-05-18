<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Главная страница</title>
    <link rel = "stylesheet" href = "/styles/style.css">
    <link rel = "stylesheet" href = "/styles/reg_log.css">
    <!--<script type = "text/javascript" src = "/scripts/lab1script.js"></script>
    <script type = "text/javascript" src = "/scripts/lab2script.js"></script>-->
</head>
<body>

<div class="header">
    <div class="h_container">
        <div class="buttons">
            <a class="button_link" href="../index.php">Main Page</a>
            <a class="button_link" href="../aboutme.php">About Me</a>
            <a class="button_link" href="../gallery.php">Gallery</a>
            <a class="button_link" href="../playthegame.php">Play The Game</a>
            <a class="button_link" href="../myworks.php">My Works</a>
            <a class="button_link" href="../mycat.php">мой кот :3</a>
        </div>
        <div class="reg_log">
            <a class="reg_log" id="reg_log" href="../reg_log.php">Register | Login</a>
        </div>
    </div>
</div>

<div class="content">
    <div class="c_container">
        <div class="login" id="boxes">
            <p class="text_content">Log in</p>
            <div class="login_box">
                <input class="t_arr_lb" type="text" placeholder="login" value>
                <input class="t_arr_lb" type="text" placeholder="password" value>
                <input type="button" value="Войти">
            </div>
        </div>
        <div class="register" id="boxes">
            <p class="text_content">Register</p>
            <div class="reg_box">
                <input class="t_arr_rb" type="text" placeholder="login" value>
                <input class="t_arr_rb" type="text" placeholder="password" value>
                <input class="t_arr_rb" type="text" placeholder="repeat password" value>
                <input type="button" value="Зарегистрироваться">
            </div>
        </div>
    </div>
</div>
</body>
</html>