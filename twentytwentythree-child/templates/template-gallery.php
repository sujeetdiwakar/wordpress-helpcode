<?php
/*
 * Template Name: Gallery Page
 */

get_header();

$args = [
    'post_type' => 'gallery',
    'posts_per_page' => -1,
];

$gallery = new WP_Query($args);
?>

<div class="js-filters">
    <?php
    if($cats = get_terms(['taxonomy' => 'gallery_cat'])):
    ?>
    <select name="cat" id="cat">
        <option value="">Select Category</option>
        <?php foreach ($cats as $cat): ?>
            <option value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>
        <?php endforeach; ?>
    </select>
    <?php endif; ?>
    <select name="popularity" id="popularity">
        <option value="">Select Rating</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
</div>

<div class="row js-content">
    <?php while ($gallery->have_posts()): $gallery->the_post();
        get_template_part('template-parts/loop','gallery');
    endwhile;
    wp_reset_postdata(); ?>

</div>

<?php
get_footer();
