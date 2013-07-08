<?php
/*
Template Name: Home Page
*/

/**
 * The template for the Home Page
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

<div class="grid-wrap">
    
<ul class="blog-roll  nav  nav--stacked  home--blog-roll">

<?php 
    $home_query = new WP_Query('posts_per_page=4&offset=0');
    $home_counter=0; 

    if (have_posts()) :    
    while ($home_query->have_posts() && $home_counter < 4 ) : 
    $home_query->the_post(); 

    ?>

    <?php $home_counter++; if( !$paged && $home_counter == 1) :?>
        
        <div class="grid-col">
        
        <div class="post  post--hero">
        
            <?php Starkers_Utilities::get_template_parts( array('parts/media/media-object') ); ?>

            <div class="excerpt">
                <?php the_excerpt(); ?>
            </div><!-- .excerpt -->

            <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">Read More</a>
        
        </div><!-- .post -->
        
        </div><!-- .grid-col -->

    <?php else :?>
    
        <div class="grid-col  bp2-col-one-third">
        
            <li class="post">
                
                <?php Starkers_Utilities::get_template_parts( array('parts/media/media-object--round') ); ?>
                
            </li><!-- .post -->
            
        </div><!-- .grid-col -->
    
    <?php endif;?>

    <?php endwhile; ?><!-- have_posts & counter -->
    

<?php endif; ?><!-- end if(have_posts) -->
    
</ul><!-- .blog-roll -->
</div><!-- .grid-wrap -->


<h3 class="align-center"><a href="<?php bloginfo('url'); ?>/archive/">All Articles</a></h3>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>


