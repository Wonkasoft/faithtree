<?php
/**
 * 
 * 
 */

if ( ! function_exists( 'faithtree_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function faithtree_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on faithtree, use a find and replace
	 * to change 'faithtree' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'faithtree', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
 * Add WooCommerce Theme support for theme
 * @since  1.0.0 [init theme creation]
 */
	add_theme_support( 'woocommerce' );

	/**
 * WooCommerce product setup
 */
require get_parent_theme_file_path( '/inc/woocommerce-setup.php' );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in 5 locations.
	// This is the Primary Main Title Menu and used on the home page
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'faithtree' ),
	) );

	// This is the Sub Menu and used on the home page
	register_nav_menus( array(
		'sub-menu' => esc_html__( 'Sub-Menu', 'faithtree' ),
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

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'faithtree_setup' );

/**
 * Enqueue scripts and styles.
 */
function faithtree_scripts() {

	// Check to see if bootstrap style is already enqueue before setting the enqueue
	$style = 'bootstrap';
	if ( ! wp_style_is( $style, 'enqueued' ) && ! wp_style_is( $style, 'done' ) ) {
    //queue up your bootstrap
		wp_enqueue_style( $style, str_replace( array( 'http:', 'https:' ), 'https:', get_template_directory_uri() . '/assets/css/bootstrap.min.css'), '3.3.7', 'all' );
	}

	wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', '4.7.0', 'all' );
	wp_enqueue_style( 'faithtree-style', get_stylesheet_uri() );

	// Check to see if bootstrap js is already enqueue before setting the enqueue
	$bootstrapjs = 'bootstrap-js';
	if ( ! wp_script_is( $bootstrapjs, 'enqueued')  &&  ! wp_script_is($bootstrapjs, 'done') ) {
	 	// enqueue bootstrap js
		wp_enqueue_script( $bootstrapjs, str_replace( array( 'http:', 'https:' ), 'https:', get_template_directory_uri() . '/assets/js/bootstrap.min.js'), array( 'jquery' ), '3.3.7', true );
	} 
	$themeName = str_replace(' theme', '', strtolower(wp_get_theme()));
	// Check is this theme has a js file and enqueue it
	if ( get_template_directory_uri() . '/assets/js/'. $themeName .'.min.js' ) {
	 	// enqueue bootstrap js
		wp_enqueue_script( $themeName . '-js', str_replace( array( 'http:', 'https:' ), 'https:', get_template_directory_uri() . '/assets/js/'. $themeName .'.min.js'), array(), '1.0.0', true );
	} 

}

add_action( 'wp_enqueue_scripts', 'faithtree_scripts' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';




