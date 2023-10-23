<h2><?php the_title(); ?></h2>
<ul>
    <?php
    $cats = get_the_terms(get_the_ID(),'movies_cat');
    $rating = get_post_meta(get_the_ID(),'_movie_rating', true); ?>
    <li>
        <strong>Rating:</strong>
        <span><?php echo $rating; ?></span>
    </li>
    <li>
        <strong>Category:</strong>
        <?php foreach ($cats as $cat){
            echo $cat->name;
        }
        ?>
    </li>
</ul>