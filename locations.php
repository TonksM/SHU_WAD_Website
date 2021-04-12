<?php
	session_start();
	require('./includes/conn.inc.php');
	require('./includes/functions.inc.php');
	$queryLocations = "SELECT locationNo, locationName, city FROM location ORDER BY city asc";
	$resultLocations = $mysqli->query($queryLocations);
	$sLocationNo = safeInt($_POST['locationNo']);
	if($sLocationNo == 0)
	{
		$sLocationNo = 1;
	}

	$stmt = $mysqli->prepare("SELECT locationNo, locationName, city, longitude, latitude, locationDesc
								FROM location WHERE locationNo = ?");
	$stmt->bind_param('i', $sLocationNo);
	$stmt->execute();
	$stmt->bind_result($locationNo, $locationName, $city, $long, $lat, $locationDesc);
	$stmt->fetch();
	$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include('./php/head.inc.php');?>
		<title>Locations - <?php echo $locationName; ?></title>
	</head>
	<body>
		<div id="container">
			<?php include('./php/header.inc.php');?><!--"header" include-->
			<div id="main">
				<div id="content">
					<h1>Locations - <?php echo $locationName; ?></h1>
					<div id="map"></div>
					<script>
						var latitude = '<?php echo "{$lat}"; ?>';
						var longitude = '<?php echo "{$long}"; ?>';
						var locationX = {"lat": latitude, "lng": longitude};
						function initMap() {
							var latLng = new google.maps.LatLng(locationX.lat, locationX.lng)
							var map = new google.maps.Map(document.getElementById('map'), {
    							zoom: 17,
    							center: latLng,
    							mapTypeId: google.maps.MapTypeId.HYBRID
 							});
							var marker = new google.maps.Marker({
    							position: latLng,
    							map: map,
    							title: '<?php echo $city." ".$locationName; ?>'
  							});
							}
					</script>
					<div id="map-right">
						<p>We here at <i><b>Planet Nine</b></i> have multiple locations around the Yorkshire and Greater Manchester areas of the UK, and hoping to expand further.</p>
						<p>We currently have locations in Bradford, Leeds, Manchester, Sheffield, and York.</p>
						<form action="locations.php" method="post">
							<table>
								<tr>
									<th><label for="location">Location:&nbsp;</label></th>
									<td><?php
										echo "<select name=\"locationNo\" id=\"locationNo\">";
										echo "<option value=\"{$locationNo}\">{$city}&nbsp;{$locationName}</option>";
										while($rowLocs = $resultLocations->fetch_assoc())
										{
											echo "<option value=\"{$rowLocs['locationNo']}\">
												{$rowLocs['city']}
												{$rowLocs['locationName']}</option>";
										}
									?></td>
								</tr>
								<tr>
									<td></td>
									<td><p><input type="submit" name="changeLoc" id="changeLoc" value="Change Location"></p></td>
								</tr>
							</table>
							<h2><?php echo $locationName.", ".$city;?></h2>
							<p><?php echo $locationDesc; ?></p>
						</form>
					</div>
				</div><!--END "content"-->
				<div id="sidebar">
					<h2>Vader solo empire</h2>
					<p>Lucas ipsum dolor sit amet moff ben twi'lek sidious obi-wan chewbacca calamari fett skywalker padmé. Organa hutt skywalker solo boba. Fett darth amidala moff darth ben antilles watto darth. Windu hutt darth endor darth palpatine coruscant organa. Boba qui-gonn boba mara organa yoda owen..</p>
				</div><!--END "sidebar"-->
			</div><!--END "main"-->
			<?php include('./php/footer.inc.php');?><!--"footer" include-->
		</div><!--END "container"-->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDojA4lTgbL7-7BLBKNjY2SbB3KnihyVZM&callback=initMap" async defer></script>
	</body>
</html>