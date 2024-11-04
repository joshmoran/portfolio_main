<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/universal.css" />
    <link rel="stylesheet" type="text/css" href="../css/doc_items.css" />
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <title>WiKi - Fixing a Navbar</title>
</head>
<body>
    <?php
        include "../inc/header.php";
    ?>
    <div id="container">
        <aside id="buttons">
            <button><a href="../docs.php">Back to documentation</a></button>
        </aside>
        <article>
            <h2>Working with a fixed navigation bar</h2>
            <h3>Things I have learned</h3>
            <ul>
                <li>Using a display: absolute CSS property</li>
                <li>Fixating the navigation bar, so as the user scrolls the page moves but the navigation bar does not</li>
                <li>At start, the content is below the navigation bar</li>
                <li>Playing with the opacity of items using the CSS: opacity</li>
            </ul>
            <h3>Outcome/experience</h3>
            <p>I have really enjoyed learning how to fixate elements of a webpage to a specific and certain area of the viewport windows. I have really enjoyed this challenge.</p>
            <h3>Screenshots</h3>
            <iframe src="html/20241009-fixed_nav_bar.html" allowfullscreen="false" loading="eager" width="100%" height="500"></iframe>
            
            <h3>Source Code</h3>
            
            <p><a href="https://github.com/joshmoran/justit_revisedportfolio/blob/main/docs/html/20241009-fixed_nav_bar.html" target="_blank">View File in the GitHub Repository</a></p>

            <iframe src="txt/20241009-fixed_nav_bar.txt" allowfullscreen="false" loading="eager" width="100%" height="500"></iframe>
        </article>
    </div>
    <?php
    include "../inc/footer.php";
    ?>
</body>
</html>