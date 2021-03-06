<?php
/**
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * 
 */

// ACF PRO SETUP

// include_once('advanced-custom-fields/acf.php');
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
     // update path
    $path = get_stylesheet_directory() . '/acfp/';
    // return
    return $path;
}
 
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    // update path
    $dir = get_stylesheet_directory_uri() . '/acfp/';
    // return
    return $dir;
}

// 3. Hide ACF field group menu item
// add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/acfp/acf.php' );

// Google Maps API key
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyBPL_70m6Amg9Tej-BHQVE0fZons4Jl1PY');
}

add_action('acf/init', 'my_acf_init');

// END ACF SETUP

/**
 * Megaworld Genesis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Megaworld_Genesis
 */

if ( ! function_exists( 'megaworld_genesis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function megaworld_genesis_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Megaworld Genesis, use a find and replace
		 * to change 'megaworld-genesis' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'megaworld-genesis', get_template_directory() . '/languages' );

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
		add_image_size( 'masonry', 300, 300, true);
		add_image_size( 'bg_medium', 1366, 768, false);
		add_image_size( 'bg_large', 1920, 1080, false);
		add_image_size( 'bg_small', 620, 620, false);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-menu' => esc_html__( 'Header Menu', 'megaworld-genesis' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'megaworld-genesis' )
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
		add_theme_support( 'custom-background', apply_filters( 'megaworld_genesis_custom_background_args', array(
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
add_action( 'after_setup_theme', 'megaworld_genesis_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function megaworld_genesis_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'megaworld_genesis_content_width', 640 );
}
add_action( 'after_setup_theme', 'megaworld_genesis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function megaworld_genesis_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'megaworld-genesis' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'megaworld-genesis' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'megaworld_genesis_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function megaworld_genesis_scripts() {

	wp_enqueue_style( 'megaworld-genesis-style', get_stylesheet_uri() );

	// MAIN STYLESHEET
	wp_enqueue_style( 'css-main', get_template_directory_uri().'/css/main.css');

	// FRONT PAGE STYLESHEET
	if(is_front_page()) wp_enqueue_style( 'css-front', get_template_directory_uri().'/css/front.css');

	// Fontawesome
	wp_enqueue_style( 'fontawesome-5', get_template_directory_uri().'/css/fa/css/fontawesome-all.min.css' );



	// =====================================
	// SCRIPTS
	wp_enqueue_script( 'megaworld-genesis-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'megaworld-genesis-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// JQuery (FOOTER)
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
	wp_enqueue_script( 'jquery' );

	// Slick
	wp_enqueue_style( 'slick', get_template_directory_uri().'/css/slick.css' );
	wp_enqueue_script( 'slick', get_template_directory_uri().'/js/slick.min.js', false, false, true );

	// GSAP
	wp_enqueue_script( 'GSAP', get_template_directory_uri().'/js/src/TweenMax.min.js', false, false, true);
	wp_enqueue_script( 'GSAP-scroll', get_template_directory_uri().'/js/src/ScrollToPlugin.min.js', false, false, true);
	
	// ScrollMagic
	wp_enqueue_script( 'scrollmagic-main', get_template_directory_uri().'/js/src/ScrollMagic.min.js', false, false, true);
	wp_enqueue_script( 'scrollmagic-gsap', get_template_directory_uri().'/js/src/animation.gsap.js', false, false, true);
	wp_enqueue_script( 'scrollmagic-indicators', get_template_directory_uri().'/js/src/debug.addIndicators.min.js', false, false, true);

	// Isotope
	wp_enqueue_script( 'imagesloaded', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', false, false, true );
	wp_enqueue_script( 'isotope', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', false, false, true );


	// Main
	wp_enqueue_script( 'main-js', get_template_directory_uri().'/js/src.js', false, false, true );
}
add_action( 'wp_enqueue_scripts', 'megaworld_genesis_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




// ===========================================
// ACF Pro Options Page Instantiate
// ===========================================

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'site-options',
		'capability'	=> 'publish_posts',
		'redirect'		=> false,
		'icon_url'		=> 'dashicons-admin-generic',
		'position'		=> '60'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Front Page Options',
		'menu_title'	=> 'Front Page',
		'parent_slug'	=> 'site-options',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Options',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'site-options',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Featured',
		'menu_title'	=> 'Featured',
		'menu_slug' 	=> 'featured',
		'capability'	=> 'publish_posts',
		'redirect'		=> false,
		'icon_url'		=> 'dashicons-star-filled',
		'position'		=> '15'
	));
	
}