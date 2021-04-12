<?php
session_start();
	ini_set("display_errors", 1);
include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');

	$sLocationNo = safeInt($_POST['locationNo']);
	$sLocationName = safeString($_POST['locationName']);
	$sCity = safeString($_POST['city']);
	$sLatitude = safeFloat($_POST['latitude']);
	$sLongitude = safeFloat($_POST['longitude']);
	$sLocationDesc = safeString($_POST['locationDesc']);

	$stmt = $mysqli->prepare("UPDATE location SET 
											locationName = ?,
											city =?,
											latitude = ?,
											longitude = ?,
											locationDesc = ?
											WHERE locationNo = ?");
	$stmt->bind_param('ssddsi',
						$sLocationName,
						$sCity,
						$sLatitude,
						$sLongitude,
						$sLocationDesc,
						$sLocationNo);
	$stmt->execute();
	$stmt->close();
	header("Location: ../location/locationDetails.php?locationNo={$sLocationNo}");
	//header("Location: ../movie/movieIndex.php")
	exit;
?>