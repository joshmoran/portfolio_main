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
    <title>Josh's Projects - RAADS-R Questionnaire Information</title>
</head>

<body>
    <?php
    include "../../../inc/header.php";
    ?>
    <div id="container">
        <div id="actions">
            <a href="../base/index.php" target="_blank">View Project</a>
            <a href="../../../projects.php">Back to Projects</a>

        </div>
        <h2>RAADS-R Questionnaire</h2>

        <h3>Reason for project</h3>
        <p>As someone who is diagnosed as autistic, I personally found diagnosis hard to accept/question that I was on the spectrum. My mind would bounce from 'im not', to 'i am' and make me question who I was as a person and as a human. Therefor, I have created this project for anyone who suspects they are on the spectrum and whether or not they need to be seen and accessed by a qualified professional. This test gives a result based on an individuals answers and scores them in ranges.</p>

        <h3>Clients Specifications and Features</h3>
        <ul>
            <li>To be able to click one answer for each question, out of the four possible answers. </li>
            <li>Using a JSON formatted document to create the input for the questionnaire.</li>
            <li>To answer questions, submit the form and return a result based on the users answers.</li>
            <li>If answers are missed, it lets the user know which question has been missed.</li>
            <li>Results are saved through PHP sessions.</li>
            <li>Existing answers are saved into session variables and are selected when the page loads.</li>
            <li>Clicking any part of the answer cell (label, td or parent td) can click the radio button.</li>
        </ul>

        <h3>References</h3>
        <p>I have followed the guidelines for this project through a PDF available through <a href="https://www.autistichub.com/raads-r-autism-online-test-questionnaire-pdf/" target="_blank">Autism hub</a>.</p>
        <p>A PDF copy can be found <a href="https://www.autistichub.com/wp-content/uploads/2022/11/RAADS-R-Autism-Test.pdf" target="_self">here.</a></p>
        <a href="https://github.com/joshmoran/Autism-AQ-Test" alt="Autism RAADS-R Test Repository" target="_blank">View Code on Github</a>
    </div>
    <?php
    include "../../../inc/footer.php";
    ?>
    <script src="../../../js/other_pages.js"></script>
</body>

</html