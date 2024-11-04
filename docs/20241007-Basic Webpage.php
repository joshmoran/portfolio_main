<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/universal.css" />
    <link rel="stylesheet" type="text/css" href="../css/doc_items.css" />
    <link rel="icon" type="image/x-icon" href="../favicon.ico"> 
    <title>WiKi - Basic Webpage</title>
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
            <h2>A Basic HTML Webpage</h2>
            <h3>Things I have learned</h3>
            <ul>
                <li>Headers - H1 to H6</li>
                <li>Paragraphs - P tags </li>
                <li>Hyperlinks - A tags </li>
                <li>Images - img tags </li>
                <li>Lists - ul and ol tags </li>
                <li>Tables - table, tr, td, th </li>
            </ul>
            <h3>Outcome/experience</h3>
            <p>I have really enjoyed learning the basic syntax of HTML elements and learning how to apply them when creating my own websites</p>
            <h3>Screenshots</h3>
            <!-- <img class="screenshot" src="20241007-Basic Webpage.png" alt="A basic webpage" />  -->
            <iframe src="html/20241007-Basic Webpage.html" allowfullscreen="false" loading="eager" width="100%" height="500"></iframe>
            <h3>Source Code</h3>
            <p><a href="https://github.com/joshmoran/justit_revisedportfolio/blob/main/docs/html/20241007-Basic%20Webpage.html" target="_blank">View File in the GitHub Repository</a></p>
            <iframe src="txt/20241007-Basic Webpage.txt" allowfullscreen="false" loading="eager" width="100%" height="500"></iframe>
        </article>
    </div>
    <?php
    include "../inc/footer.php";
    ?>
</body>
</html>