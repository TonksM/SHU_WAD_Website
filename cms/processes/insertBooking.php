<?php
session_start();
	ini_set('display_errors', 1);
	include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');

	$sLocationNo = safeInt($_POST['locationNo']);
	$sMovieNo = safeInt($_POST['movieNo']);
	$sName = safeString($_POST['name']);
	$sEmail = safeString($_POST['email']);
	$sTelephone = safeString($_POST['telephone']);
	$dtTime = $_POST['timepicker'];
	$dtDate = $_POST['datepicker'];

	$stmt = $mysqli->prepare("INSERT INTO bookings(
											locationNo,
											movieNo,
											name,
											email,
											telephone,
											viewingTime,
											viewingDate)
											VALUES (?,?,?,?,?,?,?)");
	$stmt->bind_param('iisssss',
						$sLocationNo,
						$sMovieNo,
						$sName,
						$sEmail,
						$sTelephone,
						$dtTime,
						$dtDate);
	$stmt->execute();
	$stmt->close();
	//header("Location: ./titleToNo.php?movieTitle={$sMovieTitle}");
	header("Location: ../booking/bookingIndex.php");
	exit;
?>