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
		<title><?php echo"FILMS-DETAILS-{$movieTitle}&nbsp;($releaseDate)"?></title>
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
						<?php
							echo "<table>";
							echo "<tr><th>Director:</th><td>{$mDirector}</td></tr>";
							echo "<tr><th>Featured Cast:</th><td>{$actors}</td></tr>";
							echo "<tr><th>Total Runtime:</th><td>{$runtime} minutes</td></tr>";
							echo "<tr><th>Year of release:</th><td>{$releaseDate}</td></tr>";
							echo "</table>";
						?>
					</div><!--END "content-column"-->
				</div><!--END "content"-->
			</div><!--END "main"-->
		</div><!--END "container"-->
	</body>
</html>