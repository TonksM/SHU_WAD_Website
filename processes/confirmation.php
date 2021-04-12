<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css"></link>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
					<div id="content-confirm">
						<?php echo "{$sName} confirmed for {$dtDate} at {$dtTime}. Redirecting to homepage."?>
					</div>
				</div><!--END "content"-->
			</div><!--END "main"-->
			<?php include('../php/footer.inc.php');?><!--"footer" include-->
		</div><!--END "container"-->
	</body>
</html>