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
    
    <?php the_post_thumbnail(); ?>

    <div class="article__title">
    <h1 class="article-name"><?php the_title(); ?></h1>
    
    <h2 class="article-author"><?php the_author(); ?></h2>
    
    <p class="post-date"><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'j M Y' ); ?></time></p>
    </div><!-- .article-title -->
   
    <div class="article__body">
        
        <?php the_content(); ?>
        
    </div><!-- .article__body -->
    
    <?php // if ( get_the_author_meta( 'description' ) ) : ?>
    <?php // echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
    <!--<h3>About <?php // echo get_the_author() ; ?></h3>-->
    <?php // the_author_meta( 'description' ); ?>
    <?php // endif; ?>

</div><!-- .article -->

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/latest-loop','parts/shared/footer','parts/shared/html-footer') ); ?>

