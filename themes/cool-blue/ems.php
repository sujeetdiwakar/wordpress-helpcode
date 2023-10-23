<?php
/*
 * Template Name: Employee Management System
 */
?>
<?php
	get_header(); 
?>
<!-- content-wrap -->
<div id="content-wrap">

    <!-- content -->
    <div id="content" class="clearfix">

   	    <!-- main -->
        <div id="main">


<?php
	$loop = new WP_Query(array('post_type'=>'emp'));
	if($loop->have_posts())
	{
		while($loop->have_posts())
		{
			$loop->the_post();
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
