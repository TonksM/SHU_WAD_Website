<?php
	session_start();
	ini_set("display_errors", 1);
	include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');
	$queryFilms = "SELECT movieNo, movieTitle FROM movies ORDER BY movieTitle asc";
	$resultFilms = $mysqli->query($queryFilms);
	$queryLocations = "SELECT locationNo, locationName, city FROM location ORDER BY city asc";
	$resultLocations = $mysqli->query($queryLocations);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/cmsStyle.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title><?php echo"BOOKING-INSERT"?></title>
	</head>
	<body>
		<div id="container">
			<?php include("./bookingNav.php") ?>
			<div id="main">
				<div id="content">
					<?php
						echo "<h1>Editing:</h1>";
					?>
					<table>
						<form action="../processes/insertBooking.php" method="post">
							<!--bookingNo--><input name="bookingNo" type="hidden" value="<?php echo $bookingNo; ?>">
							<!--name--><tr><th><label for="name">Name:</label></th>
							<td><input name="name" id="name" type="text" placeholder="Name"></td></tr>
							<!--email--><tr><th><label for="email">Email:</label></th>
							<td><input name="email" id="email" type="text" placeholder="email@example.com"></td></tr>
							<!--telephone--><tr><th><label for="telephone">Telephone:</label></th>
							<td><input name="telephone" id="telephone" type="text" placeholder="0xxxxxxxxxx"></td></tr>
							<!--location--><tr><th><label for="locationNo">Location:</label></th>
							<td><?php 
								echo "<select name=\"locationNo\" id=\"locationNo\">";
								echo "<option value=\"\">Select option...</option>";
								while($rowLocs = $resultLocations->fetch_assoc())
								{
									echo "<option value=\"{$rowLocs['locationNo']}\">
									{$rowLocs['city']}
									{$rowLocs['locationName']}</option>";
								}
								?>
							<!--movie--><tr><th><label for="movieNo">Movie:</label></th>
							<td><?php 
								echo "<select name=\"movieNo\" id=\"movieNo\">";
								echo "<option value=\"\">Select option...</option>";
									while($rowFilms = $resultFilms->fetch_assoc())
									{
										echo "<option value=\"{$rowFilms['movieNo']}\">
										{$rowFilms['movieTitle']}</option>";
									}
								?></td></tr>
							<!--time--><tr><th><label for="time">Time:&nbsp;</label></th>
							<td><input type="text" name="timepicker" id="timepicker" placeholder="hh:mm"></td></tr>
							<!--date--><tr><th><label for="date">Date:&nbsp;</label></th>
							<td><input type="text" name="datepicker" id="datepicker" placeholder="yyyy-mm-dd"></td></tr>
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