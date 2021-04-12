<div id="footer">
	<p>&copy; Tonks Moriarty. All images belong to their respective owners.
		&bull;&nbsp;<a href="https://github.com/xdan/datetimepicker">DateTimePicker</a> plugin from xdSoft.net
	</p>
	<p><?php 
		if(!isset($_SESSION['login']))
			echo"<a href=\"./login.html\">Login</a>";
		else
			echo"<a href=\"./processes/logout.php\">Logout</a>";
		?>
		&bull;&nbsp;<a href="./cms/cmsIndex.php">Content Management</a>
		&bull;&nbsp;<a href="./contactUs">Contact</a>
	</p>
</div><!---END "footer"-->