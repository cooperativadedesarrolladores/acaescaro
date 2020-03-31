<?php
/***********************************************
*  ENQUQUE CSS AND JAVASCRIPT
************************************************/
function invert_lite_script_enqueqe() {
	
	$themevar = wp_get_theme();

	wp_enqueue_script('invert-lite-jquery_easing',get_template_directory_uri().'/js/jquery.easing.1.3.js',array('jquery'), $themevar->Version );
	wp_enqueue_script('invert-lite-componentssimple_slide', get_template_directory_uri() .'/js/custom.js',array('jquery'), $themevar->Version  );
	wp_enqueue_script('comment-reply');
	wp_enqueue_script('invert-lite-colorboxsimple_slide',get_template_directory_uri() .'/js/jquery.prettyPhoto.js',array('jquery'),true, $themevar->Version  );
	wp_enqueue_script('hoverIntent');
	wp_enqueue_script('invert-lite-superfish', get_template_directory_uri().'/js/superfish.js',array('jquery'),true, $themevar->Version  );
	wp_enqueue_script('invert-lite-AnimatedHeader', get_template_directory_uri().'/js/cbpAnimatedHeader.js',array('jquery'),true, $themevar->Version  );

}
add_action('wp_enqueue_scripts', 'invert_lite_script_enqueqe');


function invert_lite_theme_stylesheet() {

	$theme = wp_get_theme();

	wp_enqueue_style( 'invert-lite-style', get_stylesheet_uri() );
	wp_enqueue_style( 'invert-lite-sktcolorbox-theme-stylesheet', get_template_directory_uri().'/css/prettyPhoto.css', false, $theme->Version );
	wp_enqueue_style( 'invert-lite-sktawesome-theme-stylesheet', get_template_directory_uri().'/css/font-awesome.css', false, $theme->Version );
	wp_enqueue_style( 'invert-lite-awesome-theme-stylesheet', get_template_directory_uri().'/css/font-awesome-ie7.css', false, $theme->Version  );
	wp_enqueue_style( 'invert-lite-sktddsmoothmenu-superfish-stylesheet', get_template_directory_uri().'/css/superfish.css', false, $theme->Version );/*SUPERFISH*/
	wp_enqueue_style( 'invert-lite-bootstrap-responsive-theme-stylesheet', get_template_directory_uri().'/css/bootstrap-responsive.css', false, $theme->Version  );

	/*GOOGLE FONTS*/
	wp_enqueue_style( 'invert-lite-googleFontsRoboto','//fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,300italic,300', false, $theme->Version );
	wp_enqueue_style( 'invert-lite-googleFontsLato','//fonts.googleapis.com/css?family=Lato:400,700', false, $theme->Version );

}

add_action('wp_enqueue_scripts', 'invert_lite_theme_stylesheet');

function invert_lite_head(){

	if(!is_admin())
	{
		require_once(get_template_directory().'/includes/invert-custom-css.php');
	}
	
}
add_action('wp_head', 'invert_lite_head');