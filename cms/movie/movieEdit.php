<?php
session_start();
	ini_set("display_errors", 1);
	include('../../processes/authorisation.php');
	require('../includes/conn.inc.php');
	require('../includes/functions.inc.php');
	$stmt = $mysqli->prepare("SELECT movieNo, movieTitle, movieCert, runtime, mDirector, actors, releaseDate, mDescription, imgName FROM movies WHERE movieNo = ?");
	$stmt->bind_param('i', safeInt($_GET['movieNo']));
	$stmt->execute();
	$stmt->bind_result($movieNo, $movieTitle, $movieCert, $runtime, $mDirector, $actors, $releaseDate, $mDescription, $imgName);
	$stmt->fetch();
	$stmt->close();
	$movieCert = chop($movieCert,".jpg");
	$imgName = chop($imgName,".png");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/cmsStyle.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title><?php echo"FILMS-EDIT-{$movieTitle}&nbsp;($releaseDate)"?></title>
	</head>
	<body>
		<div id="container">
			<?php include("./movieNav.php") ?>
			<div id="main">
				<div id="content">
					<div id="content-filmpageleft">
						<?php
							echo "<img src=\"../../images/moviePosters/{$imgName}\">";
						?>
					</div>
					<div id="content-filmpageright">
						<?php
							echo "<h1>Editing: {$movieTitle}&nbsp;({$releaseDate})</h1>";
						?>
					</div><!--END "content-column"-->
					<div id="content-filmpageright">
						<table>
						<form name="editForm" method="post" action="../processes/editMovie.php">
							<!--movieNo--><input name="movieNo" type="hidden" value="<?php echo $movieNo; ?>">
							<!--movieTitle--><tr><th><label for="movieTitle">Title:</label></th>
							<td><input name="movieTitle" id="movieTitle" type="text" value="<?php echo $movieTitle; ?>"></td></tr>
							<!--movieCert--><tr><th><label for="movieCert">Certification:</label></th>
							<td><input name="movieCert" id="movieCert" type="text" value="<?php echo $movieCert; ?>"></td></tr>
							<!--runtime--><tr><th><label for="runtime">Total Runtime:</label></th>
							<td><input name="runtime" id="runtime" type="text" value="<?php echo $runtime; ?>">&nbsp;minutes</td></tr>
							<!--mDirector--><tr><th><label for="mDirector">Director:</label></th>
							<td><input name="mDirector" id="mDirector" type="text" value="<?php echo $mDirector; ?>"></td></tr>
							<!--actors--><tr><th><label for="actors">Actors:</label></th>
							<td><input name="actors" id="actors" type="text" value="<?php echo $actors; ?>"></td></tr>
							<!--releaseDate--><tr><th><label for="releaseDate">Year of release:</label></th>
							<td><input name="releaseDate" id="releaseDate" type="text" value="<?php echo $releaseDate; ?>"></td></tr>
							<!--mDescription--><tr><th><label for="mDescription">Description:</label></th>
							<td><textarea name="mDescription" id="mDescription" cols="45" rows="5"><?php echo $mDescription; ?></textarea></td></tr>
							<!--imgName--><tr><th><label for="imgName">Image:</label></th>
							<!--<td><input name="imgName" id="imgName" type="file" value="<?php /*echo $imgName; */?>"></td></tr>-->
							<td><input name="imgName" id="imgName" type="text" value="<?php echo $imgName; ?>">*</td></tr>
							<!--Submit--><tr><td></td><td><input type="submit" name="submitBtn" id="submitBtn" value="Update">
															<input type="reset" name="resetBtn" id="resetBtn" value="Clear"></td></tr>
						</form>	
						</table>
						<p>*Please be aware that if you intend to change the image you'll need to upload a new image seperately from this form. Once uploaded, please enter only the file name, the file extension will be added automatically.</p>
					</div><!--END "content-column"-->
				</div><!--END "content"-->
			</div><!--END "main"-->
		</div><!--END "container"-->
	</body>
</html>