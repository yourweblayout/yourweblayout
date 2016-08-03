<?php
/**
 * yourweblayout functions and definitions
 *
 * @package yourweblayout
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 750; /* pixels */
}

if ( ! function_exists( 'yourweblayout_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function yourweblayout_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in multiple locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'yourweblayout' ),
		'secondary' => __( 'Secondary Menu', 'yourweblayout' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );
}
endif; // yourweblayout_setup
add_action( 'after_setup_theme', 'yourweblayout_setup' );

/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function yourweblayout_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'yourweblayout' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'yourweblayout' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'yourweblayout_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function yourweblayout_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'smartmenus-css', get_template_directory_uri() . '/css/jquery.smartmenus.bootstrap.css' );
	wp_enqueue_style( 'yourweblayout-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'jquery', get_template_directory_uri() . 'js/jquery-1.11.1.js'  );
	wp_enqueue_script( 'bootstrap-javascript', get_template_directory_uri() . '/js/bootstrap.js' );
	wp_enqueue_script( 'smartmenus-javascript', get_template_directory_uri() . '/js/jquery.smartmenus.js'  );
	wp_enqueue_script( 'smartmenus-bootstrap-javascript', get_template_directory_uri() . '/js/jquery.smartmenus.bootstrap.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yourweblayout_scripts' );

/**
 * Hide theme editor link.
 */
function remove_menu_elements() {
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
}
add_action( 'admin_init', 'remove_menu_elements', 102 );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Register Bootstrap navigation walker.
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
