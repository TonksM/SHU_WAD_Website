<?php
	session_start();
	include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');
	$sBookingNo = safeInt($_POST['bookingNo']);
	echo $sBookingNo."Hello";
	$stmt = $mysqli->prepare("DELETE FROM bookings WHERE bookingNo = ?");
	$stmt->bind_param('i', $sBookingNo);
	$stmt->execute();
	$stmt->close();
	echo "Booking Deleted.";
	header("Location: ../booking/bookingIndex.php");
	exit;
?>