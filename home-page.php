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
/**
global $query_string;
parse_str( $query_string, $args );
if(is_home()){
    $args['posts_per_page'] = 4;
    query_posts($args);


}else{
    $args['posts_per_page'] = 9;
    query_posts($args);
}



http://wordpress.stackexchange.com/questions/12262/how-to-customize-number-of-blog-posts-on-first-page

    global $query_string;
    parse_str( $query_string, $args );
    if(is_home() || is_front_page()){
        $args['posts_per_page'] = 3;
        query_posts($args);
    }else{
        $args['posts_per_page'] = 9;
        query_posts($args);  
**/

?>

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
            
            <?php // the_excerpt(); ?>
        
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

<?php // wp_reset_query(); ?>
<?php // wp_reset_postdata(); // reset the query ?>


    
</ul><!-- .blog-roll -->
</div><!-- .grid-wrap -->

<h3><a href="<?php bloginfo('url'); ?>/posts/">See all the articles</a></h3>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>


