<?php
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');
	$param = safeString($_GET['movieTitle']);
	//echo $param;
	$stmt = $mysqli->prepare("SELECT movieNo, movieTitle WHERE movieTitle LIKE ?");
	$stmt->bind_param('s', $param);
	$stmt->execute();
	$stmt->bind_result($movieNo);
	$stmt->fetch();
	$stmt->close();
	header("Location: ../movie/movieDetails.php?movieNo={$movieNo}");
	//echo $sMovieNo."Hello";
	exit;
?>