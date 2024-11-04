<?php
error_reporting(E_ALL);
 ini_set("display_errors", 1);
 
//require "db.php";
$sql = "SELECT * FROM documentation";
$itemsPerPage = 10;
if (isset($_get['page']) {
	$pageNo = $_GET['page'];
	$itemsViewed = $pageNo -1* $itemsPerPage;
	
	$sql .= " OFFSET BY " . $itemsViewed";
}

// headers


// get count and pagify
<ul id="pagesUl">
<?php
$createPages = $pdo->query("SELECT COUNT(id) FROM documentation");
$pageCount = 
while ( a < $createPages ) {
	
	
	echo "<li><a href='docs.php?page=" . a . "'>Page " . a . "'</a></li>
	a++;
}

?>
</ul>



// entries










?>

$allLogs = $pdo->query($sql);

foreach ( $allLogs as $row ) {
	$currentDateTime = $row['date'];
	
	if ( explode(" ", $row['date'] ) != $previousDateTime ) {
		
	}
	
	
	
	$previousDateTime = explode(" ", $currentDateTime);
}



Create table documentation (
id int not null auto_increment,
date datetime,
languages varchar(255),
comment longtext(4290000000),
primary key (id)
) ;
	
	
?>

