<?php
	function cpl_save_form()
	{
		$cpl_options=get_option("cpl_options");
		$cpl_options["username"]=$_POST["cpl_options_username"];
		$cpl_options["version"]=$_POST["cpl_options_version"];
		update_option("cpl_options", $cpl_options);
		wp_redirect(admin_url("options-general.php?page=admin_form/inc/menu.inc.php.set_options"));
	}

?>
