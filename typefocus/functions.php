<?php
/**
 * typefocus functions and definitions
 *
 * @package typefocus
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'typefocus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function typefocus_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on typefocus, use a find and replace
	 * to change 'typefocus' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'typefocus', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'typefocus' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'typefocus_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // typefocus_setup
add_action( 'after_setup_theme', 'typefocus_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function typefocus_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'typefocus' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'typefocus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function typefocus_scripts() {
	wp_enqueue_style( 'typefocus-style', get_stylesheet_uri() );

	wp_enqueue_script( 'typefocus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'typefocus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'typefocus-leftside-fill-height', get_template_directory_uri() . '/js/typefocus-leftside-fill-height.js', array('jquery'), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Others (Styles and JS)
	wp_enqueue_style( 'typefocus-style-child', get_template_directory_uri() . '/typefocus-neutral.css' );
	wp_enqueue_style( 'typefocus-font-awesome', get_template_directory_uri(). '/fonts/font-awesome.css' );
	wp_enqueue_style( 'typefocus-alegreya', get_template_directory_uri(). '/fonts/alegreya/alegreya.css' );
	wp_enqueue_style( 'typefocus-merriweather', get_template_directory_uri(). '/fonts/merriweather/merriweather.css' );
	wp_enqueue_style( 'typefocus-dancing', get_template_directory_uri(). '/fonts/dancing/dancing.css' );
	
}
add_action( 'wp_enqueue_scripts', 'typefocus_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

