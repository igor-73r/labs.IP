<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>Лабораторные работы</title>
    <link rel = "stylesheet" href = "/styles/style.css">
    <link rel = "stylesheet" href = "/styles/gallery.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../scripts/gallery.js"></script>
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
        <div class="gallery">
            <button class="buttons" id="left" onclick="leftChange()"><img class="photos" src="../images/right-arrow.png"></div>
                <div id="mainImage"></div>
            <button class="buttons" id="right" onclick="rightChange()"><img class="photos" src="../images/right-arrow.png"></button>
        </div>
    </div>
</div>
</body>
</html>