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
					<p class="post-info">
						<span>filed under</span> <?php the_category( ',' ); ?>
					</p>
					<div class="image-section">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php the_content(); ?>
				</div>
				<aside>
					<p>
						<?php the_time('M'); ?>
						<span><?php the_time('d'); ?></span>
					</p>
					<div class="post-meta">
						<h4>Post Info</h4>
						<ul>
							<li class="user"><a href="#"><?php the_author(); ?></a></li>
							<li class="time"><a href="#"><?php the_time(); ?></a></li>
							<li class="comment"><a href="#"><?php comments_number();?></a></li>
							<li class="permalink">
								<a href="<?php the_permalink();?>">Permalink</a>
							</li>
						</ul>
					</div>
					
					<div class="post-meta">
						<h4>Tags</h4>
						<?php the_tags('<ul class="tags"><li>','</li><li>','</li></ul>'); ?>
					</div>					
					
				</aside>
			</article>
			<?php
		}
	}
	else
	{
		echo 'No posts were found!';
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
