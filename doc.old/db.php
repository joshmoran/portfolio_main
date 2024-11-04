<?php


$host = "localhost";
$dbs = "docs";
$user = "portfolio_doc";
$pass ="ujo5mIcxb6n7U5sNnggD6QRXYhxVudmg041tHzUAjNAMKCFS1J4rG2sImoBXM953";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$dbs;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
	$pdo = new PDO($dsn, $user, $pass, $options);
} catch ( Exception $e) {
	echo $e->getMessage();
}

?>
