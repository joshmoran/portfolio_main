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
    <title>Josh's Tasks - Music Playlist</title>
</head>

<body>
    <?php
    include "../../../inc/header.php";
    ?>
    <div id="container">
        <div id="actions" class="flex row">
            <a href="../../../projects.php">Back to Projects</a>
        </div>
        <h2>Music Playlist</h2> 
        <span><em>A simple music playlist app using Python</em></span>

        <h3>Reason for the project</h3>
        <p>This project is for the Python technical training for the Software Development Bootcamp from JustIT.</p>

        <h3>Specifications and Requirements</h3>
        <p>Values stored in the playlist are: title, artist and genre</p>
        <p>I have managed to split up the main menu into two areas</p>
        <p>Each one is functional and validates user inputs to dynamically change and interact with the playlist data. But, from the main menu</p>
        <ul>
            <li>View and Search</li>
            <ul>
                <li>View the playlist</li>
                <li>Search by artist</li>
                <li>Search by genre</li>
                <li>Return to the main menu</li>
            </ul>
            <li>Edit the Playlist</li>
            <ul>
                <li>Add a song to the playlist</li>
                <li>Remove a song from the playlist</li>
                <li>Edit the song details</li>
                <li>Return to the main menu</li>
            </ul>
        </ul>

        <h3>Error Handling</h3>
        <p>All error handling is well documented within my GitHub link.</p>

        <h3>Outcomes</h3>
        <p>The outcome of this project has been overwhelming. Out of the four Python project set out by JustIT, this was the most difficult and time consuming task we had. All in all, I really enjoyed the project and welcomed the challenge and difficulty. Additionally, this task has reinforced my knowledge of Python and various data sets that are available within/ </p>

        <h3>Source Code and References</h3>

        <a href="https://github.com/joshmoran/python-music_playlist" alt="Angelas Website Repository" target="_blank">View on Github</a>
    </div>
    <?php
    include "../../../inc/footer.php";
    ?>
    <script src="../../../js/other_pages.js"></script>
</body>
</html