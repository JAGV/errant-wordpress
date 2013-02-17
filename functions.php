<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	register_nav_menus(array('primary' => 'Primary Navigation'));

	// This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    // This theme supports a variety of post formats.
    add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

    // This theme supports custom background color and image, and here
    // we also set up the default background color.
    add_theme_support( 'custom-background', array(
        'default-color' => 'f2f2f2',
    ) );

 	// Adds support for a custom header image.
    $args = array(
        // Text color and image (empty to use none).
        'default-text-color'     => '444',
        'default-image'          => '',

        // Set height and width, with a maximum value for the width.
        'height'                 => 250,
        'width'                  => 960,
        'max-width'              => 2000,

        // Support flexible height and width.
        'flex-height'            => true,
        'flex-width'             => true,

        // Random image rotation off by default.
        'random-default'         => false,

    );
    // init custom-header
    add_theme_support( 'custom-header', $args );

    // Share shortcode for posts
    function share_shortcode( $atts, $content = null ) {
    return '<div class="share-page">
            <h4>Share this piece</h4>
                <ul class="nav  social-icons">
                <li><a href="#" alt="Facebook">&#62992;</a></li>
                <li><a href="#" alt="Twitter">&#62993;</a></li>
                </ul><!-- .social-nav -->
            </div><!-- .share-page -->';
    }

    add_shortcode( 'share', 'share_shortcode' );

    // Custom Taxonomies

    add_action( 'init', 'create_my_taxonomies', 0 );

    function create_my_taxonomies() {
        register_taxonomy( 'author', 'post', array( 'hierarchical' => false, 'label' => 'Author', 'query_var' => true, 'rewrite' => true ) );

        register_taxonomy( 'article', 'post', array( 'hierarchical' => false, 'label' => 'Article', 'query_var' => true, 'rewrite' => true ) );

        register_taxonomy( 'places', 'post', array( 'hierarchical' => false, 'label' => 'Places', 'query_var' => true, 'rewrite' => true ) );

        register_taxonomy( 'poems', 'post', array( 'hierarchical' => false, 'label' => 'Poems', 'query_var' => true, 'rewrite' => true ) );
    }


	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}