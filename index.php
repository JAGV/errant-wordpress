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

<div class="grid-wrap">
    
<ul class="blog-roll  nav  nav--stacked  home--blog-roll">

<?php
global $query_string;
parse_str( $query_string, $args );
if(is_home()){
    $args['posts_per_page'] = 4;
    query_posts($args);
}else{
    $args['posts_per_page'] = 9;
    query_posts($args);
}

/**

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

<?php if (have_posts()) : ?>
    
    <?php $post = $posts[0]; $c=0;?>
    <?php while (have_posts() && $c < 4 ) : the_post(); ?>

    <?php $c++; if( !$paged && $c == 1) :?>
        
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

    <?php endwhile; ?>
    
    <div class="grid-col">
        <p><?php next_posts_link(); ?></p>
        <p><?php previous_posts_link(); ?></p>
    </div><!-- .grid-col -->
    
    <?php endif; ?>


    
</ul><!-- .blog-roll -->
</div><!-- .grid-wrap -->

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>


