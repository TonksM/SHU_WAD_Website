<?php
session_start();
include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');

	$sLocationName = safeString($_POST['locationName']);
	$sCity = safeString($_POST['city']);
	$sLatitude = safeFloat($_POST['latitude']);
	$sLongitude = safeFloat($_POST['longitude']);
	$sLocationDesc = safeString($_POST['locationDesc']);

	$stmt = $mysqli->prepare("INSERT INTO location(
											locationName,
											city,
											latitude,
											longitude,
											locationDesc)
											VALUES (?,?,?,?,?)");
	$stmt->bind_param('ssddi',
						$sLocationName,
						$sCity,
						$sLatitude,
						$sLongitude,
						$sLocationDesc);
	$stmt->execute();
	$stmt->close();
	//header("Location: ./titleToNo.php?movieTitle={$sMovieTitle}");
	header("Location: ../location/locationIndex.php");
	exit;
?>