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
    <title>Josh's Projects - Calculator</title>
</head>

<body>
    <?php
    include "../../../inc/header.php";
    ?>
    <div id="container">
        <div id="actions">
            <a href="../../../projects.php">Back to Projects</a>
        </div> 

        <h2>Calculator App</h2>
        <span><em>A simple calculator created using ReactJS</em></span>
        <h3>Reason for project</h3>
        <p>I am learning how to advance my JavaScript skills by extending to a framework language. Learning and developing tasks and projects through ReactJS framework. ReactJS is certainly a learning curve but I have really enjoyed developing my skills and learning how to use ReactJS effectivity and effectivity.</p>

        <h3>Specifications and Features</h3>
        <ul>
            <li>Basic mathematics</li>
            <ul>
                <li>Addition</li>
                <li>Subtraction</li>
                <li>Multiplication</li>
                <li>Division</li>
            </ul>
            <li>Number buttons 0-9</li>
            <li>Other buttons</li>
            <ul>
                <li>Add 0</li>
                <li>Add 00</li>
                <li>Delete last character (DC button)</li>
                <li>Clear calculation (AC button)</li>
                <li>Point - for floating point calculations</li>
                <li>Calculate button (= button)</li>
            </ul>
            <li>Output Boxes</li>
            <ul>
                <li>First: Last calculation to be calculated</li>
                <li>Second: current input from the user</li>
            </ul>
        </ul>

        <h3>Error Handling</h3>
        <ul>
            <li>Delete last character button (DC button)</li>
            <ul>
                <li>On empty, nothing is inserted and no errors are being thrown</li>
                <li>Using a try, catch block to asses if the input can be sliced (string method)</li>
            </ul>
            <li>Calculate sum button (= button)</li>
            <ul>
                <li>After a sum has been calculated, input the sum total is inputted back into the input box</li>
                <li>Alert the user that the sum cannot be calculated</li>
                <ul>
                    <li>E.g. 2 dots in the sum etc</li>
                    <li>If the sum is not a number</li>
                </ul>
                <li>When inputting any number 0 to 9, 0 or 00. A function evaluates if the output input is empty</li>
                <ul>
                    <li>If it is, show the button selected</li>
                    <li>If it is not, add the button on to</li>
                </ul>
            </ul>           
        </ul>

        <h3>Outcome</h3>
        <p>I have really enjoyed learning how to build a calculator application using ReactJS. It has really shown me how to create a user interface, handle user input, and perform calculations. It has also helped me understand how to handle errors in my application using try/catch statements. This has been my first task I have made using ReactJS and I really want to develop my knowledge and skills in this language.</p>
        <h3>Source Code</h3>
        <a href="https://github.com/joshmoran/calculator" alt="Autism RAADS-R Test Repository" target="_blank">View on Github</a>
    </div>
    <?php
    include "../../../inc/footer.php"?>
    ?>
    <script src="../../../js/other_pages.js"></script>
</body>

</html