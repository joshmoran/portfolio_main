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
    <title>Josh's Tasks - Expense Tracker</title>
</head>

<body>
    <?php
    include "../../../inc/header.php";
    ?>
    <div id="container">
        <div id="actions">
            <a href="../../../projects.php">Back to Projects</a>
        </div>
        <h2>Expense Tracker</h2>
        <span><em>A simple python script to help with expenses</em></span>

        <h3>Reasons for the project</h3>
        <p>This project is for the Python technical training for the Software Development Bootcamp from JustIT.</p>

        <h3>Specifications and Requirements</h3>
        <p>These are our requirements for the Python Task </p>
        <ol>
            <li>Welcome Message</li>
            <li>Log Expense</li>
            <ul>
                <li>Ask for the expense amount</li>
                <li>Ask for the expense category</li>
                <li>Ask for a description of the expense</li>
            </ul>
            <li>Store Data</li>
            <li>Display Summary</li>
            <ul>
                <li>Show the total amount spent</li>
                <li>Show the total amount spend in each category</li>
                <li>Show a list of all expenses with their details </li>
            </ul>
            <li>Data Validation</li>
            <li>Thank you message</li>
        </ol>

        <h3>Error Handling</h3>
        <p>All error handling is well documented within my GitHub link.</p>

        <h3>Outcomes</h3>
        <p>The outcome of this task has helped me to learn more about working with different data sets withing Python as well as test and challenge my knowledge and learn to adapt to the problems within developing this task. Overall, I have really enjoyed this project and really enjoyed reviewing core and vital areas of Python.</p>

        <h3>Source Code and References</h3>
        <a href="https://github.com/joshmoran/expense-tracker" alt="Expense Tracker Repository" target="_blank">View on Github</a>
    </div>
    <?php
    include "../../../inc/footer.php";
    ?>
    <script src="../../../js/other_pages.js"></script>
</body>

</html