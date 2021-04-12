<?php
session_start();
include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');

	$sMovieTitle = safeString($_POST['movieTitle']);
	$sMovieCert = safeString($_POST['movieCert']).".jpg";
	$sRunTime = safeInt($_POST['runtime']);
	$sMDirector = safeString($_POST['mDirector']);
	$sActors = safeString($_POST['actors']);
	$sReleaseDate = safeString($_POST['releaseDate']);
	$sMDescription = safeString($_POST['mDescription']);
	$sImgName = safeString($_POST['imgName']).".png";

	$stmt = $mysqli->prepare("INSERT INTO movies(
											movieTitle,
											movieCert,
											runtime,
											mDirector,
											actors,
											releaseDate,
											mDescription,
											imgName)
											VALUES (?,?,?,?,?,?,?,?)");
	$stmt->bind_param('ssisssss',
						$sMovieTitle,
						$sMovieCert,
						$sRunTime,
						$sMDirector,
						$sActors,
						$sReleaseDate,
						$sMDescription,
						$sImgName);
	$stmt->execute();
	$stmt->close();
	//header("Location: ./titleToNo.php?movieTitle={$sMovieTitle}");
	header("Location: ../movie/movieIndex.php");
	exit;
?>