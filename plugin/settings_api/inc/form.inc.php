<?php
function cpl_init_register_settings()
{
	//This function registers our options to be updated.
	register_setting('cpl_settings_api_options', 'cpl_options');
	
	//------------------------ Start Section 1 -------------------------//
	add_settings_section
	(
		'cpl_options_username', // Unique ID
		'', // Name for this section
		'cpl_options_username_section', // Function to call
		__FILE__ // Page
	);
	
	add_settings_field(
		'cpl_options_username',// Unique ID
		'Username', // Name for this field
		'cpl_options_username_field', //Function to call
		__FILE__, // Page
		'cpl_options_username' // Section to belong to
	);
	//------------------------ End Section 1 -------------------------//
	
	//------------------------ Start Section 2 -------------------------//
	add_settings_section
	(
		'cpl_options_version', // Unique ID
		'', // Name for this section
		'cpl_options_version_section', // Function to call
		__FILE__ // Page
	);
	
	add_settings_field(
		'cpl_options_version',// Unique ID
		'version', // Name for this field
		'cpl_options_version_field', //Function to call
		__FILE__, // Page
		'cpl_options_version' // Section to belong to
	);
	//------------------------ End Section 2 -------------------------//

}

function cpl_options_username_section()
{
	//echo "Username:";
}

function cpl_options_username_field()
{
	$cpl_options=get_option("cpl_options");
	echo "<input type=text name='cpl_options[username]' value='$cpl_options[username]'>";
}

function cpl_options_version_section()
{
	//echo "version:";
}

function cpl_options_version_field()
{
	$cpl_options=get_option("cpl_options");
	echo "<input type=text name='cpl_options[version]' value='$cpl_options[version]'>";
}
?>
<?php
function cpl_display_settings_api_form()
{
?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2>My Settins Options</h2>
		<form method="post" action="options.php">
			<?php settings_fields('cpl_settings_api_options'); ?>
			<?php do_settings_sections(__FILE__); ?>
			<?php submit_button();?>
		</form>
	</div>
<?php
}
?>
