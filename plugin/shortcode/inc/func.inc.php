<?php
function cpl_eol($attr)
{
	$content="************************";
	return $content;
}

function cpl_welcome($attr)
{
	$content="<b>Welcome Mr. <u>".$attr[name]."</u></b>";
	return $content;
}

function cpl_invite($attr, $content=null)
{
	$content="<b>Welcome Mr. <u>".$attr[name]."</u></b> ".$content;
	return $content;
}
