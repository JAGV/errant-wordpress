<?php
/*
Template Name: Catalogue
*/
/**
 * The template for displaying the Catalogue
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 */
?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php the_post_thumbnail(); ?>

<div class="article__body">

<?php 
    // really simple solution
    // wp_list_categories('show_count=1&title_li=<h2>Catalogue</h2>'); 
?>


<?php
//for each category, show 5 posts
$cat_args=array(
  'orderby' => 'name',
  'order' => 'ASC'
   );
$categories=get_categories($cat_args);
  foreach($categories as $category) { 
    $args=array(
      'showposts' => 5,
      'category__in' => array($category->term_id),
      'caller_get_posts'=>1
    );
    $posts=get_posts($args);
      if ($posts) {
        

        // Makes the Category title
        echo '<h2 class="category-title">The five most recent in: <span>' . $category->name.'</span></h2>';
        // open the list
        echo '<ul class="nav  nav--stacked  nav__catalogue">';
        
        
        foreach($posts as $post) {
          setup_postdata($post); ?>
          
            <li class="post">
            
            <?php Starkers_Utilities::get_template_parts( array( 'parts/media/media-meta' ) ); ?>
            
            </li><!-- .post -->            
              
          <?php
        } // foreach($posts
      } // if ($posts
        echo '<p class="see-category"><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>See all »</a></p>';
        // close the list
        echo '</ul><!-- .nav -->';
    } // foreach($categories
?>

</div><!-- .article__body -->


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>







