<?php
/*
Template Name: Custom Template
*/
get_header();
$args = [
    'post_type' => 'movies',
    'posts_per_page' => -1,
];

$movies = new WP_Query($args);
?>

<main>

    <div class="js-drop">
        <?php if($cats = get_terms(['taxonomy'=>'movies_cat'])): ?>
            <select id="js-cat">
                <option value="">Select Category</option>
                <?php foreach ($cats as $cat):?>
                    <option value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>
        <select id="js-rating">
            <option value="">Select Rating</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>

    <div class="js-posts">

        <?php while ($movies->have_posts()): $movies->the_post();

            include (MY_PLUGIN_PATH.'template-parts/loop-movie.php');

        endwhile; wp_reset_postdata();
        ?>
    </div>

</main>

<?php get_footer();
