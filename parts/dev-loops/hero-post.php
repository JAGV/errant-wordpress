<!-- 1st post different -->

<?php 

// If there are posts set the counter at 1
if (have_posts()) : $counter = 1; 

// While there are posts show the post
while (have_posts() /*&& $counter < 4*/) : the_post(); 

// If the counter is 1 and we are no paginated show a post styled green
if( $counter == 1 && !$wp_query->query_vars['paged'] ) { ?>
        
        <!-- show the green post -->
        <h1 style="color:green"><?php the_title(); ?></h1>

    <?php 
        // Else, show all other posts
        } else { 
    ?>

        <h2><?php the_title(); ?></h2>

    <?php }
    // Iterate the counter after each post
    $counter++;

    // Close the While statement
    endwhile;
    ?>  
    
    <!-- show wordpress pagination links -->
    <?php next_posts_link('Older Entries'); ?>
    <?php previous_posts_link('Newer Entries'); ?>
    
<!-- if nothing matches the criteria -->
<?php else : ?>

    <h2>Nothing Found</h2>
    
<!-- close the if statement -->   
<?php endif; ?>