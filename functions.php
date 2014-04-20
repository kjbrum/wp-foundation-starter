<?php
/**
 * wordpress-starter functions and definitions
 *
 * @package wordpress-starter
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'wordpress_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wordpress_starter_setup() {

	// Custom walker for foundation navigation
	class top_bar_walker extends Walker_Nav_Menu {

		function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
				$element->has_children = !empty($children_elements[$element->ID]);
				$element->classes[] = ($element->current || $element->current_item_ancestor) ? 'active' : '';
				$element->classes[] = ($element->has_children) ? 'has-dropdown not-click' : '';

				parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
		}

		function start_el(&$output, $item, $depth, $args) {
				$item_html = '';
				parent::start_el($item_html, $item, $depth, $args);

				$classes = empty($item->classes) ? array() : (array) $item->classes;

				if(in_array('section', $classes)) {
						$item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html);
				}

				$output .= $item_html;
		}

		function start_lvl(&$output, $depth = 0, $args = array()) {
				$output .= "\n<ul class=\"dropdown\">\n";
		}

	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wordpress-starter, use a find and replace
	 * to change 'wordpress-starter' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wordpress-starter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wordpress-starter' ),
	) );

	// Enable support for Post Formats.
	// add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'wordpress_starter_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // wordpress_starter_setup
add_action( 'after_setup_theme', 'wordpress_starter_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wordpress_starter_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wordpress-starter' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'wordpress_starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wordpress_starter_scripts() {
	wp_enqueue_style( 'wordpress-starter-style', get_template_directory_uri() . '/css/style.css' );

	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), null, false);
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation/foundation.min.js', array(), null, true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), null, true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.min.js', array(), null, true);
	wp_enqueue_script( 'wordpress-starter-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'wordpress-starter-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Use to pass backend information to the main-js file
	// $home_url = array('home_url' => home_url());
	// wp_localize_script('main-js', 'HomeUrl', $home_url);
}
add_action( 'wp_enqueue_scripts', 'wordpress_starter_scripts' );

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


/******************************
 * Custom Stuff ***************
 ******************************/

/**
 * Extract YouTube URL
 */
function willisauto_extract_youtube($video){
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video, $match);
	return $match;
}


