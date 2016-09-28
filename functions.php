<?php
/**
 * TEXTDOMAIN functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PACKAGENAME
 */

if ( ! function_exists( 'TEXTDOMAIN_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function TEXTDOMAIN_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TEXTDOMAIN, use a find and replace
	 * to change 'TEXTDOMAIN' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'TEXTDOMAIN', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'TEXTDOMAIN' ),
		'footer' => esc_html__( 'Footer Menu', 'TEXTDOMAIN' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'TEXTDOMAIN_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // TEXTDOMAIN_setup
add_action( 'after_setup_theme', 'TEXTDOMAIN_setup' );

/**
 * Remove Wordpress version number
 */
function wp_remove_version() {
	return '';
}
add_filter('the_generator', 'wp_remove_version');

/** Give Editors Access to Gravity Forms
 * Source: http://highedwebtech.com/2011/12/16/wordpress-giving-editors-access-to-gravity-forms/
 */
function add_grav_forms(){
	$role = get_role('editor');
	$role->add_cap('gform_full_access');
}
add_action('admin_init','add_grav_forms');

/**
 * Change Read More
 */
function new_excerpt_more( $more ) {
	return '...<br /><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'TEXTDOMAIN') . ' <i class="fa fa-angle-right"></i></a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function TEXTDOMAIN_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'TEXTDOMAIN_content_width', 1400 );
}
add_action( 'after_setup_theme', 'TEXTDOMAIN_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function TEXTDOMAIN_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'TEXTDOMAIN' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'TEXTDOMAIN_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function TEXTDOMAIN_scripts() {
	wp_enqueue_style( 'TEXTDOMAIN-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'TEXTDOMAIN-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	#wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '2015', true );
	#wp_enqueue_script( 'google-analytics', get_template_directory_uri() . '/js/ga.js', false, '2015', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'TEXTDOMAIN_scripts' );

/**
 * Implement the Aqua Resizer feature.
 */
require get_template_directory() . '/inc/aq_resizer.php';

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
