<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/universal.css" />
    <link rel="stylesheet" type="text/css" href="../css/doc_items.css" />
    <link rel="icon" type="image/x-icon" href="../favicon.ico"> 
    <title>WiKi - Another registration form</title>
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
            <h2>Another registration form</h2>
            <h3>Things I have learned</h3>
            <ul>
                <li>I used PHP to use POST to get the variables a user enters, submits the page and it shows what the user typed when the form is submitted. </li>
                <li>Reinforcing the learning of HTML forms</li>
                <li>Improving my knowledge on additional form elements - inputs, checkbox etc  </li>
                <li>Adding styling to the HTML form </li>
            </ul>
            <h3>Outcome/experience</h3>
            <p>This has been good for me to reinforce my knowledge on how HTML forms are structured and how they are layout. I had a lot more fun with the PHP side of this, when a user submits the form, it refreshes the page and displays each input boxes values.</p>
            <h3>Screenshots</h3>
            <!-- <img class="screenshot" src="20241007-Basic Webpage.png" alt="A basic webpage" />  -->
            <iframe src="html/20241010-registration_form_main.php" allowfullscreen="false" loading="eager" width="100%" height="500"></iframe>
            <h3>Source Code</h3>
            <p><a href="https://github.com/joshmoran/justit_revisedportfolio/blob/main/docs/html/20241010-registration_form_main.html" target="_blank">View File in the GitHub Repository</a></p>
            <iframe src="txt/20241010-registration_form.txt" allowfullscreen="false" loading="eager" width="100%" height="500"></iframe>
        </article>
    </div>
    <?php
    include "../inc/footer.php";
    ?>
</body>
</html>