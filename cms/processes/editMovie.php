<?php
session_start();
include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');

	$sMovieNo = safeInt($_POST['movieNo']);
	$sMovieTitle = safeString($_POST['movieTitle']);
	$sMovieCert = safeString($_POST['movieCert']).".jpg";
	$sRunTime = safeInt($_POST['runtime']);
	$sMDirector = safeString($_POST['mDirector']);
	$sActors = safeString($_POST['actors']);
	$sReleaseDate = safeString($_POST['releaseDate']);
	$sMDescription = safeString($_POST['mDescription']);
	$sImgName = safeString($_POST['imgName']).".png";

	$stmt = $mysqli->prepare("UPDATE movies SET 
											movieTitle = ?,
											movieCert =?,
											runtime = ?,
											mDirector = ?,
											actors = ?,
											releaseDate = ?,
											mDescription = ?,
											imgName = ?
											WHERE movieNo = ?");
	$stmt->bind_param('ssisssssi',
						$sMovieTitle,
						$sMovieCert,
						$sRunTime,
						$sMDirector,
						$sActors,
						$sReleaseDate,
						$sMDescription,
						$sImgName,
						$sMovieNo);
	$stmt->execute();
	$stmt->close();
	header("Location: ../movie/movieDetails.php?movieNo={$sMovieNo}");
	//header("Location: ../movie/movieIndex.php")
	exit;
?>