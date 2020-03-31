<?php
/**
 * Invert functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 */
/**
 * Registers widget areas.
 *
 */
function invert_lite_widgets_init() {
	register_sidebar(array(
			'name' => esc_html__('Sidebar', 'invert-lite'),
			'id' => 'blog-sidebar',
			'before_widget' => '<li id="%1$s" class="ske-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="ske-title">',
			'after_title' => '</h3>',
	));

	register_sidebar(array(
			'name' => esc_html__('Footer Sidebar', 'invert-lite'),
			'id' => 'footer-sidebar',
			'before_widget' => '<div id="%1$s" class="ske-footer-container span3 ske-container %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="ske-title ske-footer-title">',
			'after_title' => '</h3>',
	));

}
add_action( 'widgets_init', 'invert_lite_widgets_init' );


/**
 * Sets up theme defaults and registers the various WordPress features that
 * Invert supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 */
function invert_lite_theme_setup() {
	/*
	 * Makes Invert available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'invert-lite' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'invert-lite', get_template_directory() . '/languages' );
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	if ( get_option('invert_lite') != '' ) {
		$invert_lite_pre_options = get_option('invert_lite');
		$header_image =	$invert_lite_pre_options['invert_frontslider_stype'];
		$background_color = $invert_lite_pre_options['invert_bg_style'];
	} else {
		$header_image = get_template_directory_uri() . '/images/invert-header.jpg';
		$background_color = 'ffffff';
	}
	add_theme_support( 'custom-header', array( 'flex-width' => true, 'width' => 1600, 'flex-height' => true, 'height' => 750, 'default-image' => $header_image ) );
	 
	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'invert_lite_custom_background_args', array( 'default-color' => $background_color ) ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	set_post_thumbnail_size( 600, 220, true );
	add_image_size( 'invert-lite-standardimg', 770, 365, true); //standard size
	
	/**
	* SETS UP THE CONTENT WIDTH VALUE BASED ON THE THEME'S DESIGN.
	*/
	global $content_width;
	if ( ! isset( $content_width ) ){
	      $content_width = 900;
	}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'Header' => esc_html__( 'Main Navigation', 'invert-lite' ),
	));

}
add_action( 'after_setup_theme', 'invert_lite_theme_setup' ); 


/**
* Funtion to add CSS class to body
*/
function invert_lite_add_class( $classes ) {
	if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_front_page() ) {
		$classes[] = 'front-page';
	}
	
	return $classes;
}
add_filter( 'body_class','invert_lite_add_class' );

/**
 * Filter content with empty post title
 *
 */
 
add_filter('the_title', 'invert_lite_untitled');
function invert_lite_untitled($title) {
	if ($title == '') {
		return esc_html__('Untitled','invert-lite');
	} else {
		return $title;
	}
}

function invert_lite_nav() {
	if( has_nav_menu( 'Header' ) ) {
		wp_nav_menu(array( 'container_class' => 'ske-menu', 'container_id' => 'skenav', 'menu_id' => 'menu-main','theme_location' => 'Header' ));
	} 
	else {
		invert_lite_nav_fallback();
	}
}

function invert_lite_nav_fallback() {
?>
	<div class="ske-menu" id="skenav">
		<ul id="menu-main" class="menu">
			<?php wp_list_pages('title_li=&depth=0'); ?>
		</ul>
	</div>
<?php
}

/**
 * Add Customizer 
 */
require get_template_directory() . '/includes/customizer.php';
/**
 * Add Customizer 
 */
require_once(get_template_directory() . '/SketchBoard/functions/admin-init.php');

//---------------------------------------------------------------------
//---------------------------------------------------------------------
/* Theme Recommended Plugins
/*---------------------------------------------------------------------------*/
// if ( !defined( 'INVERT_REQUIRED_PLUGINS' ) ) {
// 	define( 'INVERT_REQUIRED_PLUGINS', trailingslashit(get_theme_root()) . 'invert-lite/includes/plugins' );
// }
// include_once('includes/skt-required-plugins.php');
//---------------------------------------------------------------------
/* Upshell Pro Theme
/*---------------------------------------------------------------------------*/
require_once( trailingslashit( get_template_directory() ) . 'sketchthemes-upsell/class-customize.php' );