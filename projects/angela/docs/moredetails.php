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
    <title>Josh's Projects - Angelas Website</title>
</head>

<body>
    <?php
    include "../../../inc/header.php";
    ?>
    <div id="container">
        <div id="actions" class="flex row">
            <a href="../base/index.php" target="_blank">View Project</a>
            <a href="../../../projects.php">Back to Projects</a>
        </div>
        <h2>Angela's Website</h2>

        <h3>Reason for project</h3>
        <p>A family member came to me and wanted to discuss building a website for their bakery/cooking business. I talked with them and discussed the specifications on what they wanted me to build and what they want their customers to interact with. Additionally, they wanted contact and support to be added through different means: contact form, email etc. </p>
        <p><strong>The main features of the website they wanted are: </strong></p>
        <ul>
            <li>View products</li>
            <li>Account and profiles</li>
            <li>Contact and support</li>
        </ul>

        <h3>Clients Specifications</h3>
        <p><strong>For website features</strong></p>
        <ul>
            <li>View available products, working with pages</li>
            <li>Viewing a single item which shows: <ul>
                    <li>Description</li>
                    <li>Price</li>
                    <li>Image</li>
                </ul>
            </li>
            <li>Contact thw owner on any issues, problems or concerns (via the contact form)</li>
        </ul>
        <p><strong>For customers features</strong></p>
        <ul>
            <li>Create an account (register.php)</li>
            <li>Login to an account (login.php)</li>
            <li>Add items with specified quantity into a checkout/basket</li>
            <li>Allowing the items to be checked out and saved into orders </li>
            <li>Viewing previous orders and view their status (accepted, dispatched and shipped)</li>
        </ul>
        <p><strong>For administration features</strong></p>
        <ul>
            <li>Allowing an admin role to interact with the website</li>
            <li>An outstanding orders portal, allowing:
                <ul>
                    <li>View pending orders</li>
                    <li>Allow change of the orders status</li>
                    <li>Once orders are complete, they are removed from the outstanding portal</li>
                </ul>
            </li>
        </ul>

        <h3>What I have learnt</h3>
        <p>I used procedural style of PHP, creating this website can grown and grown. Researching and troubleshooting, I find Object Orientated Programming (OOP) is a more suitable type to write large project's, whilst procedural is better for smaller/simpler projects.</p>
        
        <h3>Source Code</h3>
        <a href="https://github.com/joshmoran/angeleas_website/" alt="Angelas Website Repository" target="_blank">View on Github</a>

    </div>
    <?php
    include "../../../inc/footer.php";
    ?>
    <script src="../../../js/other_pages.js"></script>
</body>

</html