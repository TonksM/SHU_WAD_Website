<?php session_start();
include('../../processes/authorisation.php');?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/cmsStyle.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<title><?php echo"FILMS-INSERT-{$movieTitle}&nbsp;($releaseDate)"?></title>
	</head>
	<body>
		<div id="container">
			<?php include("./movieNav.php") ?>
			<div id="main">
				<div id="content">
					<div id="content-filmpageleft">
						<?php
							echo "<img src=\"../../images/moviePosters/placeHolder.png\">";
						?>
					</div>
					<div id="content-filmpageright">
						<?php
							echo "<h1>Add a new film: </h1>";
						?>
					</div><!--END "content-column"-->
					<div id="content-filmpageright">
						<table>
						<form name="editForm" method="post" action="../processes/insertMovie.php">
							<!--movieNo--><input name="movieNo" type="hidden" value="">
							<!--movieTitle--><tr><th><label for="movieTitle">Title:</label></th>
							<td><input name="movieTitle" id="movieTitle" type="text" value=""></td></tr>
							<!--movieCert--><tr><th><label for="movieCert">Certification:</label></th>
							<td><input name="movieCert" id="movieCert" type="text" value=""></td></tr>
							<!--runtime--><tr><th><label for="runtime">Total Runtime:</label></th>
							<td><input name="runtime" id="runtime" type="text" value="">&nbsp;minutes</td></tr>
							<!--mDirector--><tr><th><label for="mDirector">Director:</label></th>
							<td><input name="mDirector" id="mDirector" type="text" value=""></td></tr>
							<!--actors--><tr><th><label for="actors">Actors:</label></th>
							<td><input name="actors" id="actors" type="text" value=""></td></tr>
							<!--releaseDate--><tr><th><label for="releaseDate">Year of release:</label></th>
							<td><input name="releaseDate" id="releaseDate" type="text" value=""></td></tr>
							<!--mDescription--><tr><th><label for="mDescription">Description:</label></th>
							<td><textarea name="mDescription" id="mDescription" cols="45" rows="5"><?php echo $mDescription; ?></textarea></td></tr>
							<!--imgName--><tr><th><label for="imgName">Image:</label></th>
							<!--<td><input name="imgName" id="imgName" type="file" value="<?php /*echo $imgName; */?>"></td></tr>-->
							<td><input name="imgName" id="imgName" type="text" value="placeHolder">*</td></tr>
							<!--Submit--><tr><td></td><td><input type="submit" name="submitBtn" id="submitBtn" value="Update">
															<input type="reset" name="resetBtn" id="resetBtn" value="Clear"></td></tr>
						</form>	
						</table>
						<p>*Please be aware that if you intend to upload a new image, you'll need to upload a new image seperately from this form. Once uploaded, please enter only the file name, the file extension will be added automatically.</p>
					</div><!--END "content-column"-->
				</div><!--END "content"-->
			</div><!--END "main"-->
		</div><!--END "container"-->
	</body>
</html>