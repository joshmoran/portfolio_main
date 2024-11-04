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
    <title>Josh's Projects - Tasks App</title>
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
        <h2>Tasks App</h2>

        <span><em>A simple tasks app using vanilla JavaScript</em></span>

        <h3>Reason for project</h3>
        <p>I created this task as a challenge myself to change Document Object Models (DOM) using JavaScript. I thought a tasks app would be a really good example. Through this and using JavaScript, manipulating the webpage by adding tasks, renaming them, completing them or change a completed task back to a pending state. I thought this would be a really good task.</p>

        <h3>Specifications and Features</h3>
        <ul>
            <li>Add a new task</li>
            <li>Counter for pending items</li>
            <li>Counter for completed items</li>
            <li>Pending tasks</li>
            <ul>
                <li>Complete a task - click on the cross icon</li>
                <li>Rename</li>
                <li>Delete</li>
            </ul>
            <li>Completed Tasks</li>
            <ul>
                <li>Move back to pending - click on the cross</li>
            </ul>
        </ul>

        <h3>Error Handing</h3>
        <span>Two elements have error control</span>
        <ul>
            <li>Adding a task</li>
            <ul>
                <li>Error message when empty</li>
                <li>Alerts the user</li>
                <li>Red border around the input element</li>
            </ul>
            <li>Renaming a task</li>
            <ul>
                <li>Error when the renamed task is empty</li>
                <li>Red border around the input element to display where the error is coming from</li>
            </ul>
        </ul>

        <h3>Outcomes</h3>
        <p>I am really happy with how this task has turned out and how through the task itself, there are controls to prevent errors occurring as well as letting the user know there has been an error (empty input etc.). Additionally, this task has really helped me to have a solid grasp and knowledge on the basic fundamentals and some advanced concepts for how to manipulating DOM elements on a webpage using JavaScript.</p>
        <h3>Source Code</h3>
        <a href="https://github.com/joshmoran/tasks_app" alt="Autism RAADS-R Test Repository" target="_blank">View on Github</a>
    </div>
    <?php
    include "../../../inc/footer.php";
    ?>
    <script src="../../../js/other_pages.js"></script>
</body>
</html
