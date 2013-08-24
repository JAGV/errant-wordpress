
<p class="post-date"><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'j M Y' ); ?></time></p>
<h1 class="article-name"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

<?php $subtitle = get_post_meta($post->ID, 'subtitle', true); ?>
<?php if ($subtitle) : ?>
    <h2 class="article-subtitle"><?php echo $subtitle; ?></h2>
<?php endif; ?>

<h2 class="article-author"><?php echo get_post_meta($post->ID, 'author', true); ?></h2>
<p class="categories">in: <?php echo get_the_category_list( ', ' ); ?></p>