<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="article  full-width">
    
    

    <div class="article__title">
        
    <?php the_post_thumbnail(); ?>
    
        
    <p class="post-date"><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'j M Y' ); ?></time></p>
    
    <h1 class="article-name"><?php the_title(); ?></h1>
    
    <h2 class="article-author">
                
        <?php
            echo get_post_meta($post->ID, 'author', true);
        ?>
        
    </h2>
    
    </div><!-- .article-title -->
    
    <div class="share-page">
    <h4>Share this piece</h4>
        <ul class="nav  social-icons">
        <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" alt="Facebook">&#62992;</a></li>
        <li><a href="http://twitter.com/share" data-count="horizontal" data-via="SEOHolistically" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" title="Tweet this" target="_blank">&#62993;</a></li>
        </ul><!-- .social-nav -->
    </div><!-- .share-page -->
   
    <div class="article__body">
        
        <?php the_content(); ?>
        
    </div><!-- .article__body -->
    
    <div class="share-page">
    <h4>Share this piece</h4>
        <ul class="nav  social-icons">
        <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" alt="Facebook">&#62992;</a></li>
        <li><a href="http://twitter.com/share" data-count="horizontal" data-via="SEOHolistically" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" title="Tweet this" target="_blank">&#62993;</a></li>
        </ul><!-- .social-nav -->
    </div><!-- .share-page -->

</div><!-- .article -->

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/media/latest-loop','parts/shared/footer','parts/shared/html-footer') ); ?>

