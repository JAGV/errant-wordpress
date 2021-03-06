<?php
    /**
     * Starkers functions and definitions
     *
     * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
     *
     * @package     WordPress
     * @subpackage  Starkers
     * @since       Starkers 4.0
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
    
    Pagination This Shit Without A Plugin
    
    ======================================================================================================================== */

    function my_post_queries( $query ) {
      // not an admin page and it is the main query
        if (!is_admin() && $query->is_main_query()){
            if(is_home()){
                $query->set('posts_per_page', 9);
                }
            }
        }
        add_action( 'pre_get_posts', 'my_post_queries' );

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

    /* ========================================================================================================================
    
    Enable SVG file extensions through the media uploader

    ======================================================================================================================== */

    add_filter('upload_mimes', 'custom_upload_mimes');

    function custom_upload_mimes ( $existing_mimes=array() ) {

        // add the file extension to the array

        $existing_mimes['svg'] = 'mime/type';

            // call the modified list of extensions

        return $existing_mimes;

    }

    
    
    
    /* ========================================================================================================================
    
    Shortcodes
    
    ======================================================================================================================== */
    
    
    function get_articleEnder($atts) {
        return '<img class="articleEnder" src="http://www.errantmagazine.ca/wp-content/themes/starkers/img/article-icon.svg" />';
    }

    add_shortcode('endarticle', 'get_articleEnder');
 

    
    