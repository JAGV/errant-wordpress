<div class="thumbnail-holder">
    <a href="<?php esc_url( the_permalink() ); ?>">
    <?php
    if ( has_post_thumbnail() ) { // Check if the post has a thumb
        the_post_thumbnail( 'full', array('class' => 'post-thumb') );
        }
    ?>
    </a>
</div><!-- .thumbnail-holder -->

<div class="post__meta">
    
    <?php Starkers_Utilities::get_template_parts( array( 'parts/media/media-meta' ) ); ?>
    
    <?php // the_excerpt(); ?>
    
</div><!-- .post__meta -->