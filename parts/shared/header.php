
<div class="container">

<div class="header">
    <div class="grid-wrap">
        
    <div class="nav  grid-col">
        
    <div class="logo">
    <?php $header_image = get_header_image();
        if ( ! empty( $header_image ) ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
    <?php endif; ?>
    </div><!-- .logo -->
    
    <?php // bloginfo( 'description' ); ?>
    <?php // get_search_form(); ?>
    
    <ul class="nav  social-nav  social-icons  clearfix">
        <li><a href="#" alt="Facebook">&#62992;</a></li>
        <li><a href="#" alt="Twitter">&#62993;</a></li>
    </ul><!-- .social-nav -->
    </div><!-- .grid-col -->
    
    <div class="grid-col">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav  main-nav  clearfix' ) ); ?>
    </div><!-- .grid-col -->
 
    </div><!-- .grid-wrap -->
</div><!-- .header -->
