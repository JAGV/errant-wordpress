<div class="thumbnail-holder  thumbnail-holder--round">
    <a href="<?php esc_url( the_permalink() ); ?>">
    <?php
    if ( has_post_thumbnail() ) { // Check if the post has a thumb
    the_post_thumbnail( 'full' );
    }
    ?>
    </a>
</div><!-- .thumbnail-holder--round -->


<div class="post__meta">
    
    <?php Starkers_Utilities::get_template_parts( array( 'parts/media/media-meta' ) ); ?>
    
    <?php // the_excerpt(); ?>
    
</div><!-- .post__meta -->