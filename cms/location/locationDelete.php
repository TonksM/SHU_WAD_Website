<?php
session_start();
	ini_set("display_errors", 1);
	include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');
	$stmt = $mysqli->prepare("SELECT locationNo, locationName, city, longitude, latitude, locationDesc 
								FROM location WHERE locationNo = ?");
	$stmt->bind_param('i', safeInt($_GET['locationNo']));
	$stmt->execute();
	$stmt->bind_result($locationNo, $locationName, $city, $longitude, $latitude, $locationDesc);
	$stmt->fetch();
	$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/cmsStyle.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title><?php echo"LOCATION-DELETE-{$locationName}"?></title>
	</head>
	<body>
		<div id="container">
			<?php include("./locationNav.php") ?>
			<div id="main">
				<div id="content">
					<?php
						echo "<table>";
						echo "<tr><th>Location Name:</th><td>{$locationName}</td></tr>";
						echo "<tr><th>City:</th><td>{$city}</td></tr>";
						echo "<tr><th>Latitude:</th><td>{$latitude}</td></tr>";
						echo "<tr><th>Longitude:</th><td>{$longitude}</td></tr>";
						echo "<tr><th>Description:</th><td>{$locationDesc}</td></tr>";
						echo "</table>";
										?>
					<p>Are you sure you want to delete this booking from the database?</p>
					<form name="deleteLocation" method="post" action="../processes/deleteLocation.php">
					<input name="locationNo" id="locationNo" type="hidden" value="<?php echo $locationNo?>">
					<input name="delete" id="locationNo" type="submit" value="Delete">
					</form>
				</div><!--END "content"-->
			</div><!--END "main"-->
		</div><!--END "container"-->
	</body>
</html>