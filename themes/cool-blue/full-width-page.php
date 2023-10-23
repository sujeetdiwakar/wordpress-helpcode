<?php
/*
 * Template Name: Full Width Page
 */
?>
<?php get_header(); ?>
<!-- content-wrap -->
<div id="content-wrap">

    <!-- content -->
    <div id="content" class="clearfix">

   	    <!-- main -->
        <div id="main">

<?php
	if(have_posts())
	{
		while(have_posts())
		{
			the_post();
			?>
			<article class="post">
				<div class="primary">
					<h2>
						<a href="<?php the_permalink(); ?>">
						<?php the_title();?>
						</a>
					</h2>
					<?php the_content(); ?>
				</div>
			</article>
			<?php
		}
	}
	else
	{
		echo 'No page was found!';
	}
?>

        <!-- /main -->
        </div>

        <!-- sidebar -->
        <div id="sidebar">
		<?php get_sidebar(); ?>
        <!-- /sidebar -->
		</div>
    <!-- content -->
	</div>

<!-- /content-out -->
</div>
<?php get_footer(); ?>		
