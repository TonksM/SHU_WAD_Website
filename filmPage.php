<?php
session_start();
require('./includes/conn.inc.php');
require('./includes/functions.inc.php');
$stmt = $mysqli->prepare("SELECT movieNo, movieTitle, movieCert, runtime, mDirector, actors, releaseDate, mDescription, imgName FROM movies WHERE movieNo = ?");
$stmt->bind_param('i', safeInt($_GET['movieNo']));
$stmt->execute();
$stmt->bind_result($movieNo, $movieTitle, $movieCert, $runtime, $mDirector, $actors, $releaseDate, $mDescription, $imgName);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include('./php/head.inc.php');?>
		<title><?php echo"Films - {$movieTitle} ({$releaseDate})"?></title>
	</head>
	<body>
		<div id="container">
			<?php include('./php/header.inc.php');?><!--"header" include-->
			<div id="main">
				<div id="content">
					<div id="content-filmpageleft">
						<?php
							echo "<img src=\"images/moviePosters/{$imgName}\">";
						?>
					</div><!--END "content-column"-->
					<div id="content-filmpageright">
						<?php
							echo "<h1>{$movieTitle}&nbsp;({$releaseDate})<img width= \"10%\" height= \"10%\" src=\"images/movieCerts/{$movieCert}\" align=\"right\"></h1>";
							echo "<p>{$mDescription}</p>";
						?>
					</div><!--END "content-column"-->
					<div id="content-filmpageright">
						<?php
							echo "<table>";
							echo "<tr><th>Director:</th><td>{$mDirector}</td></tr>";
							echo "<tr><th>Featured Cast:</th><td>{$actors}</td></tr>";
							echo "<tr><th>Total Runtime:</th><td>{$runtime} minutes</td></tr>";
							echo "<tr><th>Year of release:</th><td>{$releaseDate}</td></tr>";
							echo "<tr><th></th><td></td></tr>";
							echo "</table>";
						?>
					</div><!--END "content-column"-->
				</div><!--END "content"-->
				<div id="sidebar">
					<h2>Vader solo empire</h2>
					<p>Lucas ipsum dolor sit amet moff ben twi'lek sidious obi-wan chewbacca calamari fett skywalker padmé. Organa hutt skywalker solo boba. Fett darth amidala moff darth ben antilles watto darth. Windu hutt darth endor darth palpatine coruscant organa. Boba qui-gonn boba mara organa yoda owen..</p>
				</div><!--END "sidebar"-->
			</div><!--END "main"-->
			<?php include('./php/footer.inc.php');?><!--"footer" include-->
		</div><!--END "container"-->
	</body>
</html>