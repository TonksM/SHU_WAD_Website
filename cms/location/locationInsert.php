<?php session_start();
include('../../processes/authorisation.php');?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/cmsStyle.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title><?php echo"LOCATION-INSERT"?></title>
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
						<form action="../processes/insertLocation.php" method="post">
							<!--locationNo--><input name="locationNo" type="hidden" placeholder="">
							<!--locationName--><tr><th><label for="locationName">Location Name:</label></th>
							<td><input name="locationName" id="locationName" type="text" placeholder="Location Name"></td></tr>
							<!--city--><tr><th><label for="city">City:</label></th>
							<td><input name="city" id="city" type="text" placeholder="City"></td></tr>
							<!--latitude--><tr><th><label for="latitude">Latitude:</label></th>
							<td><input name="latitude" id="latitude" type="text" placeholder="0.00000000"></td></tr>
							<!--longitude--><tr><th><label for="longitude">Longitude:</label></th>
							<td><input name="longitude" id="longitude" type="text" placeholder="0.00000000"></td></tr>
							<!--locationDesc--><tr><th><label for="locationDesc">Description:</label></th>
							<td><textarea name="locationDesc" id="locationDesc" cols="45" rows="5"></textarea></td></tr>
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