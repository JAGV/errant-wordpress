
<p class="post-date"><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'j M Y' ); ?></time></p>
        
<h1 class="article-name"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

<h2 class="article-author">

    <?php // the_author(); ?>
    
    <?php
        echo get_post_meta($post->ID, 'author', true);
    ?>
    
</h2>