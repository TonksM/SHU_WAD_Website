<?php
	session_start();
	ini_set("display_errors", 1);
	include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	$stmt = $mysqli->prepare("SELECT b.bookingNo, b.name, b.viewingTime, b.viewingDate, m.movieTitle, l.locationName, l.city 
								FROM bookings b LEFT JOIN movies m ON b.movieNo = m.movieNo LEFT JOIN location l ON b.locationNo = l.locationNo 
								ORDER BY b.viewingDate, b.viewingTime, l.city, l.locationName, b.name, m.movieTitle asc");
	$stmt->execute();
	$stmt->bind_result($bookingNo, $name, $viewingTime, $viewingDate, $movieTitle, $locationName, $city);
	$viewingTime = substr($viewingTime, 0, 5);
	$stmt->store_result();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/cmsStyle.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title>CMS-BOOKING-Index</title>
	</head>
	<body>
		<div id="container">
			<?php include("./bookingNav.php") ?>
			<div id="main">
				<div id="content">
					<h1>Bookings</h1>
					<table>
						<tr><th>Time</th><th>Date</th><th>Name</th><th>Film</th><th>Location</th><th>Options</th></tr>
						<?php
							while($stmt->fetch())
							{
								echo "<tr>";
								echo "<td>{$viewingTime}</td>";
								echo "<td>{$viewingDate}</td>";
								echo "<td>{$name}</td>";
								echo "<td>{$movieTitle}</td>";
								echo "<td>{$locationName},&nbsp;{$city}</td>";
								echo "<td><a href=\"./bookingDetails.php?bookingNo={$bookingNo}\">VIEW</a>";
								echo "<a href=\"./bookingEdit.php?bookingNo={$bookingNo}\">EDIT</a>";
								echo "<a href=\"./bookingDelete.php?bookingNo={$bookingNo}\">DELETE</a></td>";
								echo "</tr>";
							}
						?>
					</table>
				</div><!--END "content"-->
			</div><!--END "main"-->
		</div><!--END "container"-->
	</body>
</html>