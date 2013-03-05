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


<!-- opens and closes a div every 3 posts -->

<?php
// Sets the counter at 1
$counter = 1;
?>

<ul class="blog-roll  nav  nav--stacked  home--blog-roll">

<!-- opens a div grid-wrap -->
<?php echo '<div class="grid-wrap">'; ?>

<!-- begins the loop -->
<?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $custom_query = new WP_Query('posts_per_page=9&offset=4&paged=$paged');
    
    /**
    $page = get_query_var('paged');
    $page - (!empty($page) ? $page : 1);
    $args = array(
        'paged' => $page,
        'posts_per_page' => 9,
        'offset' => 4,
    );


    query_posts( $args );
    **/
    if (have_posts() ) : while ($custom_query->have_posts() ) : $custom_query-> the_post(); 
?>
    
    <!-- displays a post -->
    <div class="grid-col  bp2-col-one-third">
        
        <li class="post">
            
            <?php Starkers_Utilities::get_template_parts( array('parts/media/media-object--round') ); ?>
            
        </li><!-- .post -->
            
    </div><!-- .grid-col -->
     
    
    <?php 
        // if the counter is divided by 3 and has no remainder
        if($counter % 3 == 0) {

            // Close a div and open another div
            echo '</div><div class="grid-wrap">';
    } ?>


<?php 
    // add to the counter
    $counter++;

    // close the while loop and if statement

    endwhile; 
?>

<?php // wp_reset_postdata(); // reset the query ?>

<div class="grid-col">
    <p><?php next_posts_link(); ?></p>
    <p><?php previous_posts_link(); ?></p>
</div><!-- .grid-col -->

<?php else : ?>

<h2>No Posts to be found :(</h2>

<?php endif; ?>

<!-- close the final div -->
<?php echo '</div><!-- .grid-wrap -->'; ?>
</ul><!-- .blog-roll -->
    


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>


