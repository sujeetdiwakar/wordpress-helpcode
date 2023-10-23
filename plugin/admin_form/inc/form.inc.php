<?php
	function cpl_display_setting_form()
	{
		$cpl_options=get_option("cpl_options");
?>
		<h2>Set Options</h2>
		<form method="post" action="admin-post.php">
			<input type="hidden" name="action" value="cpl_process_form">
			Username
			<input name="cpl_options_username" value="<?php echo $cpl_options["username"]; ?>">
			<br>
			Version
			<input name="cpl_options_version" value="<?php echo $cpl_options["version"]; ?>">
			<br>
			<input type="submit" value="Update">
		</form>
<?php		
	}
?>
