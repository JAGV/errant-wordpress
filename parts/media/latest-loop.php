<h4>Latest Articles</h4>
    
<ul class="blog-roll  nav  nav--stacked  clearfix">

<div class="grid-wrap">
    
<div class="grid-col  bp2-col-one-half">

<div class="grid-wrap">

<?php
    
    $counter = 1;

    $archive_query = new WP_Query('showposts=4');
    while ($archive_query->have_posts()) : $archive_query->the_post(); 
?>
    
        <div class="grid-col  bp1-col-one-half">
          
        <li class="post">
            
        <?php Starkers_Utilities::get_template_parts( array('parts/media/media-object') ); ?>
        
        </li><!-- .post -->
            
        </div><!-- .grid-col -->
        
        
        <?php 
        // if the counter is divided by 3 and has no remainder
        if($counter % 2 == 0) {

            // Close a div and open another div
            echo '
                </div>
                </div>

                <div class="grid-col  bp2-col-one-half">
                <div class="grid-wrap">';
        } ?>
        
    
<?php 
    $counter++;
    endwhile; 
?>

</div>
</div>

</div><!-- .grid-wrap -->

</ul><!-- .blog-roll -->
    
