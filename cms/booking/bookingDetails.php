<?php
	session_start();
	ini_set("display_errors", 1);
	include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');
	$stmt = $mysqli->prepare("SELECT b.name, b.email, b.telephone, b.viewingTime, b.viewingDate, l.city, l.locationName, m.movieTitle, m.releaseDate 
								FROM bookings b LEFT JOIN movies m ON b.movieNo = m.movieNo LEFT JOIN location l ON b.locationNo = l.locationNo WHERE b.bookingNo = ?");
	$stmt->bind_param('i', safeInt($_GET['bookingNo']));
	$stmt->execute();
	$stmt->bind_result($name, $email, $telephone, $viewingTime, $viewingDate, $city, $locationName, $movieTitle, $mReleaseDate);
	$stmt->fetch();
	$stmt->close();
	$viewingTime = substr($viewingTime, 0, 5);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/cmsStyle.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title><?php echo"BOOKING-DETAILS-{$name}($viewingDate)"?></title>
	</head>
	<body>
		<div id="container">
			<?php include("./bookingNav.php") ?>
			<div id="main">
				<div id="content">
					<?php
						echo "<table>";
						echo "<tr><th>Name:</th><td>{$name}</td></tr>";
						echo "<tr><th>Email:</th><td>{$email}</td></tr>";
						echo "<tr><th>Telephone:</th><td>{$telephone}</td></tr>";
						echo "<tr><th>Viewing:</th><td>{$viewingDate}&nbsp;{$viewingTime}</td></tr>";
						echo "<tr><th>Location:</th><td>{$locationName},&nbsp;{$city}</td></tr>";
						echo "<tr><th>Movie:</th><td>{$movieTitle}&nbsp;({$mReleaseDate})</td></tr>";
						echo "</table>";
					?>
				</div><!--END "content"-->
			</div><!--END "main"-->
		</div><!--END "container"-->
	</body>
</html>