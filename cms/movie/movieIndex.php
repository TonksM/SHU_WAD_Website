<?php
session_start();
	ini_set("display_errors", 1);
	include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	$stmt = $mysqli->prepare("SELECT movieNo, movieTitle, releaseDate FROM movies ORDER BY movieTitle, releaseDate asc");
	$stmt->execute();
	$stmt->bind_result($movieNo, $movieTitle, $releaseDate);
	$stmt->store_result();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/cmsStyle.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title>CMS-FILMS-Index</title>
	</head>
	<body>
		<div id="container">
			<?php include("./movieNav.php") ?>
			<div id="main">
				<div id="content">
					<h1>Films</h1>
					<table>
						<tr><th>Film Name</th><th>Date</th><th>Options</th></tr>
						<?php
							while($stmt->fetch())
							{
								echo "<tr>";
								echo "<td>{$movieTitle}</td>";
								echo "<td>&nbsp;({$releaseDate})&nbsp;</td>";
								echo "<td><a href=\"./movieDetails.php?movieNo={$movieNo}\">VIEW</a>";
								echo "<a href=\"./movieEdit.php?movieNo={$movieNo}\">EDIT</a>";
								echo "<a href=\"./movieDelete.php?movieNo={$movieNo}\">DELETE</a></td>";
								echo "</tr>";
							}
						?>
					</table>
				</div><!--END "content"-->
			</div><!--END "main"-->
		</div><!--END "container"-->
	</body>
</html>