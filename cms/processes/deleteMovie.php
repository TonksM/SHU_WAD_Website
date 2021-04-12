<?php
session_start();
include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');
	$sMovieNo = safeInt($_POST['movieNo']);
	$stmt = $mysqli->prepare("DELETE FROM movies WHERE movieNo = ?");
	$stmt->bind_param('i', $sMovieNo);
	$stmt->execute();
	$stmt->close();
	echo "Film Deleted.";
	header("Location: ../movie/movieIndex.php");
	exit;
?>