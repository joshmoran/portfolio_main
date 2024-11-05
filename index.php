<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Josh Kelly's Portfolio</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" type="text/css" href="css/universal.css" />
    
    <link rel="stylesheet" type="text/css" href="css/index.css" />
</head>
<body>
    <?php
    include "inc/header.php";
    ?>

    <div id="container" class="flex row">
        <div id="left">
            <img src="img/cover_photo.jpg" alt="" />
        </div>
        <div id="right">
            <h2>Front and Backend Developer</h2>
            <p>Helping clients <span>develop</span>, <span>build</span> and <span>deploy</span> your digital products</p>
            <a class="cvLink" href="src/cv.pdf" target="_parent">Download My CV</a>
        </div>
    </div>

    <?php
    include "inc/footer.php";
    ?>
    <script src="js/index.js"></script>
</body>

</html>