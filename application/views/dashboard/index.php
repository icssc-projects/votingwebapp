<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1>Login</h1>
	</div><!-- /header -->

	<div class="ui-body ui-body-e">
		<form action="<?php echo $siteurl; ?>index.php/dashboard/login/" method="post" data-ajax="false">
			<p>Enter your login information: <br /><br /></p>

			<label for="username">Username:</label>
			<input type="text" name="username" id="username" value="" placeholder="Username" />
			<br />

			<label for="password">Password:</label>
			<input type="password" name="password" id="password" value="" placeholder="Password" />
			<br />

			<button type="submit" data-theme="b" name="login">Login</button>
		</form>
	</div><!-- /content -->

	<div data-role="footer">
		<h4>Created by Adam Brenner for AppJam+</h4>
	</div><!-- /footer -->
</div><!-- /page -->