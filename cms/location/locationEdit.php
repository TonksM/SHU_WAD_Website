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
		<title><?php echo"LOCATION-EDIT-{$locationName}"?></title>
	</head>
	<body>
		<div id="container">
			<?php include("./locationNav.php") ?>
			<div id="main">
				<div id="content">
					<?php
						echo "<h1>Editing:</h1>";
					?>
					<table>
						<form action="../processes/editLocation.php" method="post">
							<!--locationNo--><input name="locationNo" type="hidden" value="<?php echo $locationNo; ?>">
							<!--locationName--><tr><th><label for="locationName">Location Name:</label></th>
							<td><input name="locationName" id="locationName" type="text" value="<?php echo $locationName; ?>"></td></tr>
							<!--city--><tr><th><label for="city">City:</label></th>
							<td><input name="city" id="city" type="text" value="<?php echo $city; ?>"></td></tr>
							<!--latitude--><tr><th><label for="latitude">Latitude:</label></th>
							<td><input name="latitude" id="latitude" type="text" value="<?php echo $latitude; ?>"></td></tr>
							<!--longitude--><tr><th><label for="longitude">Longitude:</label></th>
							<td><input name="longitude" id="longitude" type="text" value="<?php echo $longitude; ?>"></td></tr>
							<!--locationDesc--><tr><th><label for="locationDesc">Description:</label></th>
							<td><textarea name="locationDesc" id="locationDesc" cols="45" rows="5"><?php echo $locationDesc; ?></textarea></td></tr>
							<!--Submit--><tr><td></td><td><input type="submit" name="submitBtn" id="submitBtn" value="Update">
							<input type="reset" name="resetBtn" id="resetBtn" value="Clear"></td></tr>
					</form>	
					</table>
				</div><!--END "content"-->
			</div><!--END "main"-->
		</div><!--END "container"-->
		<link rel="stylesheet" type="text/css" href="../../css/jquery.datetimepicker.css">
		<script type="text/javascript" src="../../js/jquery.datetimepicker.full.min.js"></script>
		<script type="text/javascript" src="../../js/dateTime.js"></script>
	</body>
</html>