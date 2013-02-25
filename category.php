<?php
/**
 * The template for displaying Category Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="article__body">

<?php if ( have_posts() ): ?>
<h1 class="category-title">All articles within: <span><?php echo single_cat_title( '', false ); ?></span></h1>
<ul class="nav  nav--stacked  nav__catalogue">
<?php while ( have_posts() ) : the_post(); ?>
    
    <li class="post">
        
    <?php Starkers_Utilities::get_template_parts( array( 'parts/media/media-meta' ) ); ?>
        
    </li><!-- .post -->

<?php endwhile; ?>
</ul><!-- .nav -->
<?php else: ?>

<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>

<?php endif; ?>

</div><!-- .article__body -->

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>