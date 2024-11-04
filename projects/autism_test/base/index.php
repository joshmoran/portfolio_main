<?php
session_start();

$_SESSION['answers'] = array();
$_SESSION['errors'] = array();
$_SESSION['score'] = 0;;

$questions = 80;

if (!isset($completed)) {
    $completed = 9;
}

if (isset($_SESSION['score']) && $_SESSION['score'] != 0) {
    $userScore = $_SESSION['score'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['selfTest'])) {
        for ($a = 1; $a <= $questions; $a++) {
            if (!empty($_POST[$a])) {
                $_SESSION['answers'][$a] = $_POST[$a];
                $_SESSION['score'] +=  $_POST[$a];
            } else {
                $_SESSION['answers'][$a] = '';
                $_SESSION['errors'][$a] = 'Please fill in question number ' . $a . ' to continue.';
            }
        }

        if (count($_SESSION['errors']) == 0) {
            $completed = 1;
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <title>Autism Test</title>
    <style>
        td {

            margin: 0 auto;
            text-align: center;
            padding: 0.25em 0.5em;

        }

        td * {
            display: block;
        }

        td:first-child,
        th:first-child {
            width: 30em;
            text-align: left;
        }

        td:nth-child(1n+2) {
            width: 7em;
        }

        label,
        input {
            width: 100%;
            height: 50%;
        }
    </style>
</head>

<body>
    <div class="messages">
        <?php
        if ($_SESSION['score'] != 0 && $completed === 1) {
            echo '<h2>Your current score is ' . $_SESSION['score'] . '</h2>';
            $score = $_SESSION['score'];
            if ($score > 0 && $score < 65) {
                echo '<p>You have a very low score and most likely not on the spectrum</p>';
            } else if ($score > 64) {
                echo '<p>You have a high probability that you are on the spectrum.</p>';
                echo '<p>Please contact a health care professional to determine a valid diagnosis.</p>';
            } else {
                echo '<p>There has been an issue with your score. Please try again</p>';
            }
        }

        if (count($_SESSION['errors']) > 0) {
            foreach ($_SESSION['errors'] as $error) {
                echo '<p>' . $error . '</p>';
            }
        }
        ?>
    </div>
    <div id="information">
        <h1>RAADS-R Self Questionanire.</h1>
        <h2>How scoring works</h2>
        <ul>
            <li>There are 80 questions.</li>
            <li>Each question has 4 possible answers:
                <ul>
                    <li>True now and when I was young</li>
                    <li>True only now</li>
                    <li>True only when I was younger than 16</li>
                    <li>Never true</li>
                </ul>
            </li>
            <li>Scoring range has the lowest of a score of 0 whilst the highest possible score is 240</li>
            <li>There is a threshold score of 65, having a score above 65 means there is a likely chance you are on the autism spectrum. Whilst in the websites research, no neurotypical scored above 64.</li>
        </ul>
    </div>
    <form accept="index.php" method="post" name="selfTest">
        <table>
            <!-- 5 columns
                    question
                     -->
            <tr>
                <th>Question</th>
                <th>Option 1</th>
                <th>Option 2</th>
                <th>Option 3</th>
                <th>Option 4</th>
            </tr>
            <?php

            $string = file_get_contents('json.json');
            $json = (array) json_decode($string, true);


            // for($a = 0; $a < count($json); $a++ ) {
            foreach ($json as $array => $value) {
                echo '<tr>';
                echo '<td ><label for="' . (string)$value['no'] . '">Q' . (string)$value['no'] . '. ' . (string)$value['name'] . '</label></td>';
                foreach ($value['answers'] as $answer => $point) {
                    echo '<td onclick="clickTd()"><label onclick="clickLabel()" for="' . (string)$value['no'] . '">' . (string)$answer . '</label><input type="radio" name="' . (string)$value['no'] . '" class="' . $value['no'] . '" value="' . (int)$point . '" /></td>';
                }
                echo '</tr>';
            }
            ?>
            <tr>
                <td></td>
                <td colspan="4"><input type="submit" name="selfTest" value="Submit Answers" /></td>
            </tr>
        </table>
    </form>
    <script src="jquery.js"></script>
    <script>
        label = document.getElementsByTagName('label');


        function clickTd() {
            event.target.lastChild.checked = true;
        }

        function clickLabel() {
            event.target.nextElementSibling.checked = true;
        }

        var data = <?php echo json_encode($_POST) ?>;
        let noOfQuestions = 80;


        for (b = 1; b <= noOfQuestions; b++) {
            let el = document.getElementsByClassName(b);
            for (c = 0; c < el.length; c++) {
                if (el[c].value == data[b]) {
                    el[c].checked = true;
                }
            }
        }
    </script>
</body>

</html>