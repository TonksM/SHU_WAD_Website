<?php session_start();
	include('../processes/authorisation.php');?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="./css/cmsStyle.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title><?php echo"FILMS-EDIT-{$movieTitle}"?></title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="nav">
					<ul id="menu">
						<li><a href="../index.html" title="Return">&lt;Return to Website</a></li>
					</ul>
				</div><!--END "nav"-->
			</div><!--END "header"-->
			<div id="main">
				<div id="content">
					<h1>Select cotent mananger: </h1>
					<ul>
						<li><a href="./movie/movieIndex.php" title="Films">Films</a></li>
						<li><a href="./booking/bookingIndex.php" title="Bookings">Bookings</a></li>
						<li><a href="./location/locationIndex.php" title="Locations">Locations</a></li>
					</ul>
				</div><!--END "content"-->
			</div><!--END "main"-->
		</div><!--END "container"-->
	</body>
</html>