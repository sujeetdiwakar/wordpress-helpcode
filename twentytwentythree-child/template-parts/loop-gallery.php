<div class="col-md-4">
    <h4><?php the_title(); ?></h4>
    <?php
        $rating = get_field('popularity');
        $cats = get_the_terms(get_the_ID(),'gallery_cat');
    ?>
    <ul>
        <li><strong>Rating</strong><?php echo $rating; ?></li>
        <li><strong>Category</strong><?php foreach ($cats as $cat): ?>
            <span><?php echo $cat->name; ?></span>
            <?php endforeach; ?></strong></li>
    </ul>
</div>