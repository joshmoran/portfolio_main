<?php 
    $html = '';
    
    if ( isset( $_POST['firstName'])) {
        $html .= '<p>First NAme: ' . $_POST['firstName'] . '<br />';
    }

    if ( isset( $_POST['secondName'])) {
        $html .= '<p>Second Name: ' . $_POST['secondName'] . '<br />';
    }

    if ( isset( $_POST['email'])) {
        $html .= '<p>Email: ' . $_POST['email'] . '<br />';
    }

    if ( isset( $_POST['mobile'])) {
        $html .= '<p>Mobile Number: ' . $_POST['mobile'] . '<br />';
    }

    if ( isset( $_POST['agree'])) {
        $html .= '<p>Agree to out T&C: ' . $_POST['agree'] . '<br />';
    } else if ( !isset( $_POST['agree'])) {
        if ( !empty($_POST['firstName']) || !empty($_POST['lastName']) || !empty($_POST['email']) || !empty($_POST['mobile']) ){ 
            $html .= '<p>Agree to out T&C: Off <br />';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #registration {
            display: flex;
            align-content: center;
            flex-direction: column;
            top: 100vh;
            width: 400px;
            margin: 0 auto;
        }
        #output {
            border: 5px solid darkgrey;
            width: 100%;
            background-color: lightgrey;
            padding: 0.5em;
            margin: 1em;
        }

        h1 {
            display: block;
            width: 100%;
        }
        label   {
            width: 125px;
            display: inline-block;
        }

        label, input {
            margin: 5px;
            padding: 10px;
        }

        input:active {
            border: 5px solid red;
        }

        [type="checkbox"] {
            width: 25px;
            height: 25px;
        }

        [type="submit"] {
            margin: 0 auto;
            width: 100px;
            position: relative;
            display: block;
        }
    </style>
</head>
<body>
    <div id="registration">
        <h1>Registration Page</h1>
        <p>Please sign up to use our service.</p>
        <div id="output">
            <p><?php if ( isset ( $html )) { echo $html; } ?></p>
        </div>
        <form action="index.php" method="POST">
            <label for="firstName">First Name: </label>
            <input type="text" name="firstName" />
            <br />
            <label for="secondName">Second Name: </label>
            <input type="text" name="secondName" />
            <br />
            <label for="email">Email: </label>
            <input type="email" name="email" />
            <br />
            <label for="mobile">Mobile Number: </label>
            <input type="number" name="mobile" />
            <br />
            <label for="agree">Agree: </label>
            <input type="checkbox" name="agree" />
            <br />
            <input type="submit" name="submit" />

        </form>
    </div>
</body>
</html>