<!--
  -- 
    This Loop is broken as is, 
    it should show 3 posts on the first page
    and the blog amount on every page after
    -->

<?php 
      // Show this many posts on front page
      $max_first_page = 3;  
      // Equates the variable "args" with the variable $wp_query
      $args = $wp_query->query;
      // Using stickies messes up the count (I don't know what this does)
      $args['caller_get_posts'] = 1; 
      // Tracks the page?
      $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
      // Sets $posts_per_page to the blog variable posts per page?
      $posts_per_page = get_query_var('posts_per_page');
      // Number of posts to skip on the first page is 
      // posts_per_page - max_first_page
      $posts_to_skip = $posts_per_page - $max_first_page;
      
      // If the page is one, the number of posts is "max_first_page"
      if ($page == 1) {
         $max_posts = $max_first_page;
      // If the page is any other page, posts per page is posts_per page
      } else {
         $max_posts = $posts_per_page;
         // This sets what the offset value should be
         $args['offset'] = (($page - 1) * $max_posts)- $posts_to_skip;
      }
      // Queries posts with the args value
      query_posts($args);
      // 
      if ($wp_query->max_num_pages < ceil(($wp_query->found_posts + $posts_to_skip)/$posts_per_page))
        ++$wp_query->max_num_pages;
      // Set counter to 0
      $counter = 0;
      ?>
  
   <?php if (have_posts()) : ?>
    
    <?php while (have_posts()) : the_post(); ?>
    
    <?php if (++$counter > $max_posts) continue; ?>
         
         <!-- the post -->
         <h1><?php the_title(); ?></h1>
    
    
    <!-- 
      --
      these are my puny attempts at closing the loop
      they all seem to have failed 
      -->
    <?php endif; ?>
    <?php endwhile; ?>
