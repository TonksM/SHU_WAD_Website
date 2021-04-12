<?php
	session_start();
	ini_set('display_errors', 1);
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');
	$sLocationNo = safeInt($_POST['locationNo']);

	$stmt = $mysqli->prepare("SELECT locationNo, locationName, city, longitude, latitude
								FROM location WHERE locationNo = ?");
	$stmt->bind_param('i', $sLocationNo);
	$stmt->execute();
	$stmt->bind_result($locationNo, $locationName, $city, $long, $lat);
	$stmt->fetch();
	$stmt->close();
?>
	<form