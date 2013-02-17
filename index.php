<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 */
?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if (have_posts()) : ?>

<div class="grid-wrap">
    
<ul class="blog-roll  nav  nav--stacked  home--blog-roll">
    
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
    
</ul><!-- .blog-roll -->
</div><!-- .grid-wrap -->

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>


