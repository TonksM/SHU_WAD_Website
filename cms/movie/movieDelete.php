<?php
	session_start();
	ini_set("display_errors", 1);
	include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');
	$stmt = $mysqli->prepare("SELECT movieNo, movieTitle, movieCert, runtime, mDirector, actors, releaseDate, mDescription, imgName FROM movies WHERE movieNo = ?");
	$stmt->bind_param('i', safeInt($_GET['movieNo']));
	$stmt->execute();
	$stmt->bind_result($movieNo, $movieTitle, $movieCert, $runtime, $mDirector, $actors, $releaseDate, $mDescription, $imgName);
	$stmt->fetch();
	$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/cmsStyle.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title><?php echo"FILMS-DELETE-{$movieTitle}&nbsp;($releaseDate)"?></title>
	</head>
	<body>
		<div id="container">
			<?php include("./movieNav.php") ?>
			<div id="main">
				<div id="content">
					<div id="content-filmpageleft">
						<?php
							echo "<img src=\"../../images/moviePosters/{$imgName}\">";
						?>
					</div>
					<div id="content-filmpageright">
						<?php
							echo "<h1>{$movieTitle}&nbsp;({$releaseDate})<img width= \"10%\" height= \"10%\" src=\"../../images/movieCerts/{$movieCert}\" align=\"right\"></h1>";
							echo "<p>{$mDescription}</p>";
						?>
					</div><!--END "content-column"-->
					<div id="content-filmpageright">
						<h2>Delete?</h2>
						<p>Are you sure you want to delete this movie from the database?</p>
						<form name="deleteForm" method="post" action="../processes/deleteMovie.php">
							<input name="movieNo" id="movieNo" type="hidden" value="<?php echo $movieNo?>">
							<input name="delete" id="movieNo" type="submit" value="Delete">
						</form>
					</div><!--END "content-column"-->
				</div><!--END "content"-->
			</div><!--END "main"-->
		</div><!--END "container"-->
	</body>
</html>