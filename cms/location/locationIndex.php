<?php
session_start();
	ini_set("display_errors", 1);
	include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	$stmt = $mysqli->prepare("SELECT locationNo, locationName, city, longitude, latitude
								FROM location ORDER BY city, locationName asc");
	$stmt->execute();
	$stmt->bind_result($locationNo, $locationName, $city, $longitude, $latitude);
	$stmt->store_result();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/cmsStyle.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title>CMS-LOCATION-Index</title>
	</head>
	<body>
		<div id="container">
			<?php include("./locationNav.php") ?>
			<div id="main">
				<div id="content">
					<h1>Locations</h1>
					<table>
						<tr><th>Name</th><th>City</th><th>Options</th></tr>
						<?php
							while($stmt->fetch())
							{
								echo "<tr>";
								echo "<td>{$locationName}</td>";
								echo "<td>{$city}</td>";
								echo "<td><a href=\"./locationDetails.php?locationNo={$locationNo}\">VIEW</a>";
								echo "<a href=\"./locationEdit.php?locationNo={$locationNo}\">EDIT</a>";
								echo "<a href=\"./locationDelete.php?locationNo={$locationNo}\">DELETE</a></td>";
								echo "</tr>";
							}
						?>
					</table>
				</div><!--END "content"-->
			</div><!--END "main"-->
		</div><!--END "container"-->
	</body>
</html>