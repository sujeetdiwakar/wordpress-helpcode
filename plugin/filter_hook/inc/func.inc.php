<?php
function my_custom_login_logo() 
{
    echo '<style type="text/css">
        h1 a {background-image:url(http://example.com/your-logo.png) !important; margin:0 auto;}
        </style>';
}

function pk_change_content($content)
{
	$content.="Click <a href='http://www.glug4muz.org' target=new>Here</a> For More Details";
	return $content;
}

function login_errors_example( $error ) 
{
    $error = 'Invalid Login Details. Please Try Again.';
    return $error;
}
