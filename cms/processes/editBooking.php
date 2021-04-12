<?php
session_start();
include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');

	$sBookingNo = safeInt($_POST['bookingNo']);
	$sName = safeString($_POST['name']);
	$sEmail = safeString($_POST['email']);
	$sTelephone = safeString($_POST['telephone']);
	$sLocationNo = safeInt($_POST['locationNo']);
	$sMovieNo = safeInt($_POST['movieNo']);
	$dtTime = $_POST['timepicker'];
	$dtDate = $_POST['datepicker'];


	$stmt = $mysqli->prepare("UPDATE bookings SET 
											locationNo = ?,
											movieNo = ?,
											name = ?,
											email = ?,
											telephone = ?,
											viewingTime = ?,
											viewingDate = ?
											WHERE bookingNo = ?");
	$stmt->bind_param(	'iisssssi',
						$sLocationNo,
						$sMovieNo,
						$sName,
						$sEmail,
						$sTelephone,
						$dtTime,
						$dtDate,
						$sBookingNo);
	$stmt->execute();
	$stmt->close();
	header("Location: ../booking/bookingDetails.php?bookingNo={$sBookingNo}");
	//header("Location: ../movie/movieIndex.php")
	exit;
?>