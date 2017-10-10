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
	 * If you're building a theme based on Real e-state, use a find and replace
	 * to change 'real-e-state' to the name of your theme in all the template files.
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

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in six locations.
	// This is the Primary Main Title Menu and used in the header.php file
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'faithtree' ),
	) );

	// This is the Sub Menu and used in the header.php file
	register_nav_menus( array(
		'menu-2' => esc_html__( 'SubMenu', 'faithtree' ),
	) );

	// This menu is on the footer for the explore menu and used in the footer.php file
	register_nav_menus( array(
		'menu-3' => esc_html__( 'Explore', 'faithtree' ),
	) );

	// This menu is on the footer for the about menu and used in the footer.php file
	register_nav_menus( array(
		'menu-4' => esc_html__( 'About', 'faithtree' ),
	) );

	// This menu is on the footer for the contact menu and used in the footer.php file
	register_nav_menus( array(
		'menu-5' => esc_html__( 'Contact', 'faithtree' ),
	) );

	// This menu is on the footer for the connect menu and used in the footer.php file
	register_nav_menus( array(
		'menu-6' => esc_html__( 'Connect', 'faithtree' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'faithtree_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

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
		wp_enqueue_style( $style, get_template_directory_uri() . '/assets/css/bootstrap.min.css', '3.3.7', 'all' );
	}

	wp_enqueue_style( 'faithtree-style', get_stylesheet_uri() );

	// Check to see if bootstrap js is already enqueue before setting the enqueue
	$bootstrapjs = 'bootstrap-js';
	if ( ! wp_script_is( $bootstrapjs, 'enqueued')  &&  ! wp_script_is($bootstrapjs, 'done') ) {
	 	// enqueue bootstrap js
		wp_enqueue_script( $bootstrapjs, get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );
	} 
}

add_action( 'wp_enqueue_scripts', 'faithtree_scripts' );