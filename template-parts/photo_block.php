<div class="photo-block">
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('medium', ['class' => 'photo-thumbnail']); ?>
        <h3><?php the_title(); ?></h3>
    </a>
</div>
