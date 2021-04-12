<?php
	session_start();
include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');
	$sLocationNo = safeInt($_POST['locationNo']);
	$stmt = $mysqli->prepare("DELETE FROM location WHERE locationNo = ?");
	$stmt->bind_param('i', $sLocationNo);
	$stmt->execute();
	$stmt->close();
	echo "Booking Deleted.";
	header("Location: ../location/locationIndex.php");
	exit;
?>