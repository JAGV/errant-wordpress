<!-- Original loop -->

<?php if (have_posts()) : ?>

<!--
    pagination?
    http://stackoverflow.com/questions/14216560/wordpress-pagination-not-working-on-frontpage
    -->    
    
    <?php $post = $posts[0]; $c=0;?>
    <?php while (have_posts() && $c < 4 ) : the_post(); ?>

    <?php $c++; if( !$paged && $c == 1) :?>
        
        <div class="grid-col">
        
        <div class="post  post--hero">
        
            
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
            <p class="post-date"><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'j M Y' ); ?></time></p>
            <h1 class="article-name">
            <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?>
            </a>
            </h1>
            <h2 class="article-author"><?php the_author(); ?></h2>
            <?php // the_excerpt(); ?>
            </div><!-- .post__meta -->
        
        </div><!-- .post -->
        
        </div><!-- .grid-col -->

    <?php else :?>
        <div class="grid-col  bp2-col-one-third">
        
            <li class="post">
                
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
                <p class="post-date"><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'j M Y' ); ?></time></p>
                <h1 class="article-name">
                <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?>
                </a>
                </h1>
                <h2 class="article-author"><?php the_author(); ?></h2>
                <?php // the_excerpt(); ?>
                </div><!-- .post__meta -->
                
            </li><!-- .post -->
            
        </div><!-- .grid-col -->
    
    <?php endif;?>

    <?php endwhile; ?>
    
    <div class="grid-col">
        <p><?php next_posts_link(); ?></p>
        <p><?php previous_posts_link(); ?></p>
    </div><!-- .grid-col -->
    
    <?php endif; ?>
