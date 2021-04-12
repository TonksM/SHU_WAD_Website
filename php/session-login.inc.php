				<div id="login">
					<?php 
						if($_SESSION['count'] > 0 && $_SESSION['count'] <= 3 ){
							echo "<p class=\"error\">Sorry incorrect</p>";
						}
						if($_SESSION['count'] > 3){
							echo "<p class=\"error\">Too many attempts</p>";
						}else{
					?>
					<form id="loginForm" name="loginForm" method="post" action="processes/login.php">
						<h2 class="header-box">Hello</h2>
						<p>&nbsp;</p>
						<p><label for="username">Username:&nbsp;</label>
						<input name="username" id="username" type="text"></input></p>
						<p><label for="password">Password:&nbsp;&nbsp;</label>
						<input name="password" id="password" type="password"></input></p>
						<input type="submit" name="Submit" id="Submit" value="Login"><input type="reset" name="Clear" id="Clear" value="Reset">
						<p>&nbsp;</p>
					</form><?php }?>
				</div>