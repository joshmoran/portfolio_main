<?php

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link type="text/css" rel="stylesheet" href="../../../css/universal.css">
    <link type="text/css" rel="stylesheet" href="../../../css/moredetails.css">
    <title>Josh's Projects - Image Carousel</title>
</head>

<body>
    <?php
    include "../../../inc/header.php";
    ?>
    <div id="container">
        <div id="actions">
            <a href="../base/index.html" target="_blank">View Project</a>
            <a href="../../../projects.php">Back to Projects</a>
        </div>
        <h2>Image Carousel</h2>

        <span>A simple image carousel gallery using vanilla JavaScript</span>

        <h3>Reason for project</h3>
        <p>Yet another task where I can learn and reinforce what I know. This has helped me with areas of JavaScript such as event handlers, Document Object Model (DOM) manipulation, changing attributes for HTML elements and various others..</p>

        <h3>Specifications and Features</h3>
        <ul>
            <li>Slideshow features</li>
            <ul>
                <li>Interval allows the image to change after a certain time (3000ms)</li>
                <li>On mouseover, stop the slideshow</li>
                <li>On mouseleave, start the slideshow</li>
            </ul>
            <li>Individual Buttons to set the image</li>
            <li>Next and previous buttons to show the relevant image, back or forward</li>
        </ul>

        <h3>Event Handling</h3>

        <ul>
            <li>On mouseover, stop the slideshow and show a banner saying it has been paused</li>
            <li>On mouse exit, stop the slideshow and hide the banner and remove any text from the banner</li>
        </ul>
        
        <h3>Source Code </h3>
        <a href="https://github.com/joshmoran/carousel" alt="View the carousel repository on github" target="_blank">View on Github</a>
    </div>
    <?php
    include "../../../inc/footer.php";
    ?>
    <script src="../../../js/other_pages.js"></script>
</body>
</html

