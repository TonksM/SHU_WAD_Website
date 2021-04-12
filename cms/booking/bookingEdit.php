<?php
	session_start();
	ini_set("display_errors", 1);
	include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');
	$stmt = $mysqli->prepare("SELECT b.bookingNo, b.name, b.email, b.telephone, b.viewingTime, b.viewingDate, l.locationNo, l.city, l.locationName, m.movieNo, m.movieTitle, m.releaseDate 
								FROM bookings b LEFT JOIN movies m ON b.movieNo = m.movieNo LEFT JOIN location l ON b.locationNo = l.locationNo WHERE b.bookingNo = ?");
	$stmt->bind_param('i', safeInt($_GET['bookingNo']));
	$stmt->execute();
	$stmt->bind_result($bookingNo, $name, $email, $telephone, $viewingTime, $viewingDate, $locationNo, $city, $locationName, $movieNo, $movieTitle, $mReleaseDate);
	$stmt->fetch();
	$stmt->close();
	$stmtFilms = $mysqli->prepare("SELECT movieNo, movieTitle FROM movies ORDER BY movieTitle asc");
	$stmtFilms->bind_result($movNo, $movTitle);
	$stmtLocs = $mysqli->prepare("SELECT locationNo, locationName, city FROM location ORDER BY city asc");
	$stmtLocs->bind_result($locNo, $locName, $locCity);
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
		<title><?php echo"BOOKING-EDIT-{$name}($viewingDate)"?></title>
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
						<form action="../processes/editBooking.php" method="post">
							<!--bookingNo--><input name="bookingNo" type="hidden" value="<?php echo $bookingNo; ?>">
							<!--name--><tr><th><label for="name">Name:</label></th>
							<td><input name="name" id="name" type="text" value="<?php echo $name; ?>"></td></tr>
							<!--email--><tr><th><label for="email">Email:</label></th>
							<td><input name="email" id="email" type="text" value="<?php echo $email; ?>"></td></tr>
							<!--telephone--><tr><th><label for="telephone">Telephone:</label></th>
							<td><input name="telephone" id="telephone" type="text" value="<?php echo $telephone; ?>"></td></tr>
							<!--location--><tr><th><label for="locationNo">Location:</label></th>
							<td><?php 
								echo "<select name=\"locationNo\" id=\"locationNo\">";
								echo "<option value=\"{$locationNo}\">{$city}&nbsp;{$locationName}</option>";
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
								echo "<option value=\"{$movieNo}\">{$movieTitle}</option>";
									while($rowFilms = $resultFilms->fetch_assoc())
									{
										echo "<option value=\"{$rowFilms['movieNo']}\">
										{$rowFilms['movieTitle']}</option>";
									}
								?></td></tr>
							<!--time--><tr><th><label for="time">Time:&nbsp;</label></th>
							<td><input type="text" name="timepicker" id="timepicker" value="<?php echo $viewingTime;?>"></td></tr>
							<!--date--><tr><th><label for="date">Date:&nbsp;</label></th>
							<td><input type="text" name="datepicker" id="datepicker" value="<?php echo $viewingDate;?>"></td></tr>
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