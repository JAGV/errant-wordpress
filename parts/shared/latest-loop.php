<h4>Latest Articles</h4>
<div class="grid-wrap">
  <?php
    $archive_query = new WP_Query('showposts=4');
    while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
    
    <ul class="blog-roll  nav  nav--stacked">
        <div class="grid-col  bp1-col-one-half  bp2-col-one-quarter">
          
            <li class="post  other--post">
                <div class="thumbnail-holder">
                    <a href="<?php esc_url( the_permalink() ); ?>">
                    <?php the_post_thumbnail(); ?>
                    </a>
                </div><!-- .thumbnail-holder -->
                
                <div class="post__meta">
                <p class="post-date"><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'j M Y' ); ?></time></p>
                <h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
                    <?php the_title(); ?>
                </h2></a>
                <div class="excerpt">
                    <?php the_excerpt(); ?>
                </div><!-- .excerpt -->
                    
                </div><!-- .post__meta -->
            
            </li><!-- .post -->
            
        </div><!-- .grid-col -->
    </ul><!-- .blog-roll -->
<?php endwhile; ?>
    
</div><!-- .grid-wrap -->