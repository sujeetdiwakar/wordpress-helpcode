<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CoolBlue</title>
	<?php wp_head(); ?>
	<!--
    <link rel="stylesheet" type="text/css" media="screen" href="wp-content/themes/cool-blue/css/coolblue.css" />
	-->
    <!--[if lt IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<!--
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.6.1.min.js"><\/script>')</script>
	
    <script src="js/scrollToTop.js"></script>
    -->
</head>

<body id="top">

<!--header -->
<div id="header-wrap"><header>

 	<hgroup>
        <h1><a href="index.html">Coolblue</a></h1>
        <h3>Just Another Styleshout Template</h3>
    </hgroup>

    <!--
    <nav>
		<ul>
			<li id="current"><a href="index.html">Home</a><span></span></li>
			<li><a href="style.html">Style Demo</a><span></span></li>
			<li><a href="blog.html">Blog</a><span></span></li>
			<li><a href="archive.html">Archives</a><span></span></li>
			<li><a href="index.html">Support</a><span></span></li>
			<li><a href="index.html">About</a><span></span></li>
		</ul>
	</nav>
	-->
	
	<?php
		wp_nav_menu(array('theme_location'=>'main', 'menu'=>'main', 'container'=>'nav' ));
	?>

    <div class="subscribe">
        <span>Subscribe:</span> <a href="#">Email</a> | <a href="#">RSS</a>
    </div>

   <form id="quick-search" method="get" action="index.html">
      <fieldset class="search">
         <label for="qsearch">Search:</label>
         <input class="tbox" id="qsearch" type="text" name="qsearch" value="Search..." title="Start typing and hit ENTER" />
         <button class="btn" title="Submit Search">Search</button>
      </fieldset>
   </form>

<!--/header-->
</header></div>
