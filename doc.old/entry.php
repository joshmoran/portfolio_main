<link href="../css/universal.css" rel="stylesheet" type="text/css">
<link href="../css/entry.css" rel="stylesheet" type="text/css">
<?php 

error_reporting(E_ALL);
ini_set("display_errors", 1);

// if ( !isset( $_GET['id'])){ 
//     header("Location: doc.php?error=noid");
// }

// $dir = '/var/www/docs/images/' . $dateTime[0] . '/';
// $fileDir = scandir($dir);
// $fileArray = array();

// foreach ($fileDir as $html_file) {
//     if ( str_contains($html_file, $dateTime[1] )) {
//         $fileArray[] = $html_file;
//     }
// }


// Header 


include '../inc/header.php';

?>

<div id="container">
<div id="errors">
	<?php 
		if (isset ($error_message)) {
			echo '<h2>' . $error_message . '</h2>';;
		}
	?>
</div>
<div id="entry">
<a href="doc.php" class="button" >Back to WiKi</a>
<?php
require 'db.php';

// echo $db;

$id = $_GET['id'];

$sql = "SELECT *  FROM documentation WHERE id = " . $_GET['id'];
$result = $pdo->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);

$html = '';

// Basic Detail Top

$html .= '<h2>Title: ' . $row['title'] . '</h2>';
$html .= '<h3>Topics: ' . $row['languages'] . '</h3>';
$html .= '<h3><b>Date:</b> ' . $row['date'] . '</h3>';

// Content Body
$html .= '<h3>Information</h3>';
$html .= '<p>'. $row['comment'] . '</p>';

$html .= '<h3>What I have learnt</h3>';
$html .= '<p>' .  $row['learnt'] . '</p>';

// Pictures

echo $html;

$array = array();

$sqlC = "SELECT * FROM captions WHERE date = '" . $row['date'] . "'";
$resultC = $pdo->query($sqlC);
while( $captions = $resultC->fetch(PDO::FETCH_ASSOC) ){
    $array[] = $captions;
}

$htmlC = '';

foreach ($array as $row) {
    $htmlC .= '<div id="images">';
    $date = explode(" ", $row['date']);

    $htmlC .= '<img src="images/' . $date[0] . '/' . $row['filename'] . '.png">';
    $htmlC .= '<h4>' . $row['caption'] . '</h4>';
    // } else if ( $key == 'caption') {
    //     $htmlC .= $key . '</img>';
    //     $htmlC .= '<h3>' . $key . '</h3>';
    // }

    $htmlC .= '</div>';
}

echo $htmlC;


?>
</div>




</div>
<?php
include '../inc/footer.php';

?>