<?php

define( 'PRELUDE_VERSION', '1.0.6' );

if ( !function_exists( 'prelude_features' ) ) {

	// Register Theme Features
	function prelude_features()
	{
		// Add theme support for Automatic Feed Links
		add_theme_support( 'automatic-feed-links' );

		// Add theme support for Post Formats
		add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside' ) );

		// Add theme support for Featured Images
		add_theme_support( 'post-thumbnails' );

		// Add theme support for HTML5 Semantic Markup
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Add theme support for document Title tag
		add_theme_support( 'title-tag' );

		// Clean up the default WordPress head section
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'start_post_rel_link' );
		remove_action( 'wp_head', 'index_rel_link' );
		remove_action( 'wp_head', 'adjacent_posts_rel_link' );
	}

	add_action( 'after_setup_theme', 'prelude_features' );
}

/**
 * Load jQuery
 */

if ( !is_admin() ) {
	add_action( 'wp_enqueue_scripts', function () {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', ( 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js' ), false );
		wp_enqueue_script( 'jquery' );
	} );
}

/**
 * Defer jQuery Parsing using the HTML5 defer property
 */

if ( !is_admin() && !is_page_template( 'templates/big-send.php' ) || !is_admin() && !is_page_template( 'templates/big-upload.php' ) ) {
	function defer_parsing_of_js( $url )
	{
		if ( FALSE === strpos( $url, '.js' ) ) return $url;
		if ( strpos( $url, 'jquery.min.js' ) ) return $url;
		// return "$url' defer ";
		return "$url' defer onload='";
	}

	add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
}

/**
 * Link to all theme CSS files.
 */
function prelude_theme_scripts()
{
	// CSS
	wp_enqueue_style( 'prelude-css', get_template_directory_uri() . '/assets/css/theme.min.css', array(), PRELUDE_VERSION );

	// JS
	wp_enqueue_script( 'prelude-js', get_template_directory_uri() . '/assets/js/theme.min.js', array(), PRELUDE_VERSION, true );
}

add_action( 'wp_enqueue_scripts', 'prelude_theme_scripts' );

/**
 * Load BigUpload and Download.
 */
//  function bigForms() {
//    wp_enqueue_script('cross-domain-script', get_template_directory_uri() . '/assets/js/jquery.xdomainrequest.min.js', array(), '1.0.1', false);
//    wp_enqueue_script('filepicker', 'https://api.filepicker.io/v1/filepicker.js', array(), '1.0.0', false);
//
//    // if its big send
//    if( is_page_template('templates/big-send.php') ){
//      wp_enqueue_script('big-send-js', get_template_directory_uri() . '/assets/js/bigdownload_v1.2.js', array(), '1.2', false);
//    } elseif ( is_page_template('templates/big-upload.php') ) {
//      wp_enqueue_script('big-upload-js', get_template_directory_uri() . '/assets/js/bigupload_v1.2.js', array(), '1.2', false);
//    }
//  }
//  add_action('wp_enqueue_scripts', 'bigForms');

/**
 * Load menus
 */
require get_template_directory() . '/inc/menus.php';

/**
 * Load custom post types
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Load widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load tweaks
 */
require get_template_directory() . '/inc/tweaks.php';

/**
 * Load thumbnail support and sizes
 */
require get_template_directory() . '/inc/thumbnails.php';

/**
 * Load shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load ACF Options
 */
require get_template_directory() . '/inc/acf.php';
