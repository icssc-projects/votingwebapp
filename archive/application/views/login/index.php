<div id="container">
	<h1>Please Login! - <a href="<?php echo $siteurl; ?>index.php/results/">Public Results</a></h1>

	<div id="body">
		<p>Please login to vote for AMASE!</p>
		<?php
		if($status == "invalid")
		{
		?>
			<p><font color="red">Invalid username or password.</font></p>
		<?php
		}
		else if($status == "contact")
		{
		?>
			<p><font color="red">Blame Adam, something is fucked up with the database!</font></p>
		<?php
		}
		else if($status == "out")
		{
		?>
			<p><font color="red">You are now logged out :)</font></p>
		<?php
		}
		?>
		<form method="POST" action="<?php echo $siteurl; ?>index.php/welcome/verify">
		<p>Username: <input name="username" type="text" size="45" /></p>
		<p>Password: <input name="password" type="password" size="45" /></p>
		<p><input name="submit" type="submit" value="Sign In &raquo;" /></p>

	</div>
