<?php include_once "templates/header.php"?>
<link rel = "stylesheet" href = "/styles/gallery.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../scripts/gallery.js"></script>

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