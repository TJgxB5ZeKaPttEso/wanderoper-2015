<?php
/**
 * Wanderoper Brandenburg 2015 functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Wanderoper Brandenburg 2015
 */

if (!function_exists('wanderoper_2015_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function wanderoper_2015_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Wanderoper Brandenburg 2015, use a find and replace
         * to change 'wanderoper-2015' to the name of your theme in all the template files.
         */
        load_theme_textdomain('wanderoper-2015', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        add_image_size('large-thumb', 1600, 900, true);
        add_image_size('index-thumb', 780, 250, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'wanderoper-2015'),
        ));

        register_nav_menu( 'repertoire', esc_html__( 'Repertoire Menu', 'wanderoper-2015' ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
        ));

        // Set up the WordPress core custom background feature.
//	add_theme_support( 'custom-background', apply_filters( 'wanderoper_2015_custom_background_args', array(
//		'default-color' => 'ffffff',
//		'default-image' => '',
//	) ) );

    }
endif; // wanderoper_2015_setup
add_action('after_setup_theme', 'wanderoper_2015_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

function wanderoper_2015_content_width()
{
    $GLOBALS['content_width'] = apply_filters('wanderoper_2015_content_width', 1140);
}

add_action('after_setup_theme', 'wanderoper_2015_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wanderoper_2015_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'wanderoper-2015'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'wanderoper_2015_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wanderoper_2015_scripts()
{
    wp_enqueue_style('wanderoper-2015-style', get_stylesheet_uri());

    wp_enqueue_script('wanderoper-2015-navigation', get_template_directory_uri() . '/js/build/navigation.js', array(), '20120206', true);

    wp_enqueue_script('wanderoper-2015-skip-link-focus-fix', get_template_directory_uri() . '/js/build/skip-link-focus-fix.js', array(), '20130115', true);

    wp_enqueue_script('wanderoper-2015-min-js', get_template_directory_uri() . '/assets/js/main.min.js');

    if ( is_home() || is_page(774)) {
        wp_enqueue_script('wanderoper-2015-slider-tabs', get_template_directory_uri() . '/js/build/rev-slider-tabs.js');
        wp_enqueue_script('wanderoper-2015-repertoire-toggle', get_template_directory_uri() . '/js/build/rep-toggle.js');
    }

    wp_enqueue_script('wanderoper-2015-revslider', get_template_directory_uri() . '/js/build/revslider.js');

    wp_enqueue_style('wanderoper-2015-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700');

    wp_enqueue_style('wanderoper-2015-icons', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');

    wp_enqueue_style('wanderoper-2015-layout-style', get_template_directory_uri() . '/layouts/content-sidebar.css');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'wanderoper_2015_scripts');

/**
 * Implement the Custom Header feature.
 */
    require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * all slider aliases
 */


function all_rev_sliders_in_array(){
    if (class_exists('RevSlider')) {
        $theslider     = new RevSlider();
        $arrSliders = $theslider->getArrSliders();
        $arrA     = array();
        $arrT     = array();
        foreach($arrSliders as $slider){
            $arrA[]     = $slider->getAlias();
            $arrT[]     = $slider->getTitle();
        }
        if($arrA && $arrT){
            $result = array_combine($arrA, $arrT);
        }
        else
        {
            $result = false;
        }
        return $result;
    }
}

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * remove Auto p tags
 */

//remove_filter('the_content', 'wpautop');


/**
 * Adds start time to event titles in Month view
 */
function tribe_add_start_time_to_event_title ( $post_title, $post_id ) {

    if ( !tribe_is_event($post_id) ) return $post_title;
    // Checks if it is the month view, modify this line to apply to more views
    //if ( !tribe_is_month() ) return $post_title;

    //---

    if (tribe_is_past() || tribe_is_upcoming() && !is_tax()) {
        $event_start_time = tribe_get_start_time($post_id);
        if (!empty($event_start_time)) {
         //   $post_title = $post_title . ' | ' . $event_start_time;
        }
        return $post_title;
    } else {
        return $post_title;
    }
}
add_filter( 'the_title', 'tribe_add_start_time_to_event_title', 100, 2 );

add_filter( 'tribe_events_event_schedule_details_formatting', 'remove_end_time', 10, 2);

function remove_end_time( $formatting_details ) {
    if( tribe_is_past() || tribe_is_upcoming() && !is_tax() ) {
        $formatting_details['show_end_time'] = 0;
    }

    return $formatting_details;
}









/**
 * Event title link to repertoire page
 */

function tribe_set_link_website ( $link, $postId ) {
    $website_url = tribe_get_event_website_url( $postId );
    // Only swaps link if set
    if ( !empty( $website_url ) ) {
        $link = $website_url;
    }
    return $link;
}
add_filter( 'tribe_get_event_link', 'tribe_set_link_website', 100, 2 );