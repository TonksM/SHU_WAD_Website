<?php
	session_start();
	ini_set('display_errors', 1);
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');
	$sMovieNo = safeInt($_POST['movieNo']);
	$sLocationNo = safeInt($_POST['locationNo']);
	$sName = safeString($_POST['name']);
	$sEmail = safeString($_POST['email']);
	$sTelephone = safeString($_POST['telephone']);
	$dtTime = $_POST['timepicker'];
	$dtDate = $_POST['datepicker'];

	$stmt = $mysqli->prepare("INSERT INTO bookings(movieNo, 
												locationNo,
												name,
												email, 
												telephone,
												viewingTime,
												viewingDate) 
										VALUES (?,?,?,?,?,?,?)");

	$stmt->bind_param(  'iisssss',
						$sMovieNo, 
						$sLocationNo, 
						$sName,
						$sEmail,
						$sTelephone,
						$dtTime,
						$dtDate);
	$stmt->execute();
	$stmt->close();
	//include('./confirmation.php');
	header("Location: ../index.html");
	exit();
?>