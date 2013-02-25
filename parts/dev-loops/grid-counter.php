<!-- opens and closes a div every 3 posts -->

<?php
// Sets the counter at 1
$counter = 1;
?>

<!-- opens a div -->
<?php echo '<div style="color: green;">'; ?>

<!-- begins the loop -->
<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
    
    <!-- displays a post -->
    <h1><?php the_title(); ?></h1>
     
    
    <?php 
        // if the counter is divided by 3 and has no remainder
        if($counter % 3 == 0) {

            // Close a div and open another div
            echo '</div><div style="color: red;">';
    } ?>


<?php 
    // add to the counter
    $counter++;

    // close the while loop and if statement
    endwhile; 
    endif; 
?>

<!-- close the final div -->
<?php echo '</div>'; ?>