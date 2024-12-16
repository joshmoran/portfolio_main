<?php

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link type="text/css" rel="stylesheet" href="../../../css/moredetails.css">
    <link type="text/css" rel="stylesheet" href="../../../css/css.css">
    <title></title>
</head>

<body>
    <?php
    include "../../../inc/header.php";
    ?>
    <div id="container">
        <div id="actions">
            <a href="../../../projects.php"><button>Back to Projects</button></a>
        </div>
            
        <h2>Weather</h2>
        <span><em>A simple python script to get the current weather</em></span>

        <h3>Reasons for this project</h3>
        <p>This project is for the Python technical training for the Software Development Bootcamp from JustIT.</p>

        <h3>Specifications and Requirements</h3>
        <p>These are our requirements for the Python Task </p>
        <ol>
            <li>Welcome Message</li>
            <li>User Input/li>
            <li>Fetch weather data - hardcoded JSON data</li>
            <li>Display weather data</li>
            <ul>
                <li>Current temperature</li>
                <li>Weather conditions (e.g. sunny, rainy etc)</li>
                <li>Wind speed</li>
                <li>Humidity</li>
            </ul>
            <li>Data validation</li>
            <li>Thank you messages</li>
        </ol>

        <h3>Error Handling</h3>
        <p>All error handling is well documented within my GitHub link.</p>

        <h3>Outcomes</h3>
        <p>Developing this weather app with Python has helped me to reinforce using data in a JSON format. THis has been a really good start for me to develop a task with. In the future I hope to develop my Python skills using Flask and develop applications that use an API to get JSON data as a response.</p>

        <h3>Source Code and References</h3>
        <a href="https://github.com/joshmoran/python-weather" alt="Weather Repository" target="_blank">View on Github</a>
        <a href="project_details.pdf" alt="Task Outline for Weather">View Task </a>
    </div>
    <!-- <?php
            include "../../../inc/footer.php";
            ?> -->
</body>

</html