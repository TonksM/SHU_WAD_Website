<?php 
session_start();
require('../includes/conn.inc.php'); 
require('../includes/functions.inc.php'); 
// Check Form submitted
if(isset($_GET['movieTitle'])){
	// Build Search String
	$sMovieTitle = safeString($_GET['movieTitle']);
	$searchString = "%".$sMovieTitle."%";
	// prepare SQL
	$stmt = $mysqli->prepare("SELECT movieNo, movieTitle, imgName, releaseDate FROM movies WHERE movieTitle LIKE ? ORDER BY movieTitle asc");
	$stmt->bind_param('s', $searchString);
	$stmt->execute();
	$stmt->bind_result($movieNo, $movieTitle, $imgName, $releaseDate);
	$stmt->store_result();
	$numRows = $stmt->num_rows;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title>Films - Search Results: <?php echo"{$numRows}"?></title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="logo">
					<img src="../images/logotext.png"></img>
				</div>
				<div id="nav">
					<ul id="menu">
						<li><a href="../index.html" title="Home">Home</a></li>
						<li><a href="../locations.html" title="Locations">Locations</a></li>
						<li><a href="../films.html" title="Films">Films</a></li>
						<li><a href="../about.html" title="About">About Us</a></li>
						<li><a href="../book.html" title="Book">Book Now</a></li>
					</ul>
				</div><!--END "nav"-->
			</div><!--END "header"-->
			<div id="main">
				<div id="content">
					<h1>Search Results:</h1>
					<?php
					while($stmt->fetch()) 
					{
						echo "<div id=\"content-tricolumn\">";
						echo "<p><a href=\"../filmPage.php?movieNo={$movieNo}\">
						<img width=\"75%\" height\"75%\" src=\"../images/moviePosters/{$imgName}\"></a></p>";
						echo "<h3><a href=\"../filmPage.php?movieNo={$movieNo}\">{$movieTitle}&nbsp;({$releaseDate})</a></h3>";
						echo "</div>";
					}
					?>
				</div><!--END "content"-->
				<div id="sidebar">
					<form id="search" method="get" action="search.php">
						<h2>Search Film:</h2>
						<p>
							<input name="movieTitle" type="text" id="movieTitle">
							<input type="submit" name="submit" value="Search" href>
						</p>
					</form>
				</div><!--END "sidebar"-->
			</div><!--END "main"-->
			<?php include('./php/footer.inc.php');?><!--"footer" include-->
		</div><!--END "container"-->
	</body>
</html>