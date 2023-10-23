<?php
function cpl_mb_create()
{
	add_meta_box
	( 
	'cpl_custom_metabox_id', //ID
	'Custom Meta Box', //Title
	'cpl_mb_message',  //Callback Function
	'post',  //Post Type
	'normal', //Context
	'high' //Priority
	);
}

function cpl_mb_message($post)
{
	echo '<h2>Set Reference</h2>';
	$name_value = get_post_meta( $post->ID, '_post_reference_name', true );

	echo '<label for="reference-name">'. 'Reference Name' .'</label>';
	echo '<input type="text" id="reference-name" name="post_reference_name" placeholder="Example" value="'.$name_value.'" size="25"/>';
	echo '<p class="howto">'. 'Add the name of the reference' .'</p>';
}

function save_post_reference( $post_id ) 
{
	$reference_name = $_POST['post_reference_name'];
	update_post_meta( $post_id, '_post_reference_name', $reference_name );
}

function cpl_display_the_content($content)
{
	$name_value = get_post_meta( get_the_ID(), '_post_reference_name', true );
	$content.="Reference name is $name_value";
	return($content);
}
?>
