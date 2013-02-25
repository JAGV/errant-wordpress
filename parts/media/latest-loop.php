<h4>Latest Articles</h4>
<div class="grid-wrap">
    
<ul class="blog-roll  nav  nav--stacked  clearfix">
  <?php
    $archive_query = new WP_Query('showposts=4');
    while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
    
    
        <div class="grid-col  bp1-col-one-half  bp2-col-one-quarter">
          
        <li class="post">
            
        <?php Starkers_Utilities::get_template_parts( array('parts/media/media-object') ); ?>
        
        </li><!-- .post -->
            
        </div><!-- .grid-col -->
    
<?php endwhile; ?>

</ul><!-- .blog-roll -->
    
</div><!-- .grid-wrap -->