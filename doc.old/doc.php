<link href="../css/docs.css" rel="stylesheet" type="text/css" />
<link href="../css/universal.css" rel="stylesheet" type="text/css" />

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (isset($_GET['error'])){
	if ( $_GET['error'] == 'noid'){
		$error_message = 'Please select an entry';
	}
}
// General varioables 
$charInDesc = 100;

require "db.php";

include '../inc/header.php';

?>
 <!-- headers -->

 <div id="container">
<div id="errors">
	<?php 
		if (isset ($error_message)) {
			echo '<h2>' . $error_message . '</h2>';;
		}
	?>
</div>

<!-- // get count and pagify -->
<div id="pages">
<ul id="pagesUI">
<?php
$createPages = $pdo->query("SELECT COUNT(id) FROM documentation")->fetchColumn();
$totalNo = ceil( $createPages / 10);

$pageCount;
$a = 0;
while ( $a < $totalNo ) {
	echo "<li><a href='doc.php?page=" . $a . "'>Page " .( $a + 1) . "</a></li>";
	$a = $a + 1;
}
?>
</ul>
<!-- entries -->
</div>
<div id="entries">
<?php
$itemsPerPage = 10;
$sql = "SELECT * FROM documentation ORDER BY date LIMIT " . $itemsPerPage;

if (isset($_GET['page']) && $_GET['page'] != null) {
	$pageNo = $_GET['page'];
	$itemsViewed = ($pageNo + 1 ) * $itemsPerPage;

	$sql .= " OFFSET  " . ($itemsViewed - $itemsPerPage);
}

$allLogs = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$imgDir = 'images/';

foreach ( $allLogs as $row ) {
	$html = '<div id="item">';
	
	$html .= '<div id="left">';

	$dateTime = explode(" ", $row['date']);

	// $dir = '/var/www/docs/images/' . $dateTime[0] . '/' . $dateTime[1] . '-cover.png';
	// $fileDir = scandir($dir);
	// $file = "";
	// $time = explode(":", $dateTime[1]);

	// foreach ($fileDir as $html_file) {
	// 	$fileConcat =  $time[0] . $time[1] . $time[2] . '-cover';

	// 	if ( str_contains($html_file, $fileConcat)) {
	// 		$file = $html_file;
	// 		break;
	// 	}

	// }

	$timeExplode = explode(':', $dateTime[1]);

	$time = $timeExplode[0] . '-' . $timeExplode[1] . '-' . $timeExplode[2];

	$html .= '<img src="images/' . $dateTime[0]  . '/' . $time  . '-cover.png"/>' ;
	$html .= '</div>';
	$html .= '<div id="right">';
	$html .= '<a href="entry.php?id=' . $row['id'] . '">';
	$html .= '<h2>' . $row['title'] . '</h2>';
	$html .= '<h3>Topics: ' . $row['languages'] . '</h3>';
	$html .= '<h3>Date: ' . $row['date'] . '</h3>';

	$html .= '<p>' .substr( $row['comment'], 0, $charInDesc ) . '...</p>';
	$html .= '</div>';
	$html .= '</a>';
	$html .= '</div>';


	$currentDateTime = $row['date'];

	//echo $currentDateTime;
	echo $html;
	
	// if ( explode(" ", $row['date'] ) != $previousDateTime ) {
		
	// }
	
	
	
	//$previousDateTime = explode(" ", $currentDateTime);
}





?>
</div>
</div>


<?php


include '../inc/footer.php';

?>
