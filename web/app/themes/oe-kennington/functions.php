<?php
/**
 * Maat or the Improved Bootstrap functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage maat-or-the-improved-bootstrap
 * @since 1.0
 */

/**
 * Stylesheets
 */
function themeslug_enqueue_style() {
	wp_enqueue_style( 'bootstrap-css', 
    get_template_directory_uri() 
    . '/bower_components/bootstrap/dist/css/bootstrap.min.css', 
    false ); 
	wp_enqueue_style( 'core', 
    get_template_directory_uri() 
    . '/style.css', 
    false );
}
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );

/**
 * Remove the WP jquery version
 * (avoid conflicts)
 */
// wp_deregister_script( 'jquery' );
// not allowed, use Jquery in protected mode

/**
 * JavaScripts, Jquery, Bootsrrap.js, etc.
 */
function wpdocs_maat_scripts() {
    wp_enqueue_script( 'Jquery', get_template_directory_uri() 
    . '/bower_components/jquery/dist/jquery.min.js');
    wp_enqueue_script( 'Bootstrap-js', 
      get_template_directory_uri() 
      . '/bower_components/bootstrap/dist/js/bootstrap.min.js');
    wp_enqueue_script( 'menu-js', 
      get_template_directory_uri() 
      . '/js/menu.js');
    wp_enqueue_script( 'html5-js', 
      get_template_directory_uri() 
      . '/js/html5.js');
    wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_maat_scripts' );

/** Register Custom Navigation Walker
 * see: https://github.com/twittem/wp-bootstrap-navwalker
 **/
require_once('includes/wp_bootstrap_navwalker.php');

// Bootstrap Navigation
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 
    'maat-or-the-improved-bootstrap' ),
) );

/**
 * Widget Area (on the sidebar)
 **/
function petj_widgets() {
	register_sidebar( array(
		'name'          => 'widget1',
		'id'            => 'widget_1',
		'before_widget' => '<aside>',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widgetHead">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'petj_widgets' );

/**
 * Title-tag
 **/
function theme_slug_setup() {
	add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'theme_slug_setup' );

/**
 * Automatic Feed Links
 **/
add_theme_support( 'automatic-feed-links' );

/**
 * wp_link_pages
 **/
$defaults = array(
	'before'           => '<p>' . __( 'Pages:' , "maat-or-the-improved-bootstrap"),
	'after'            => '</p>',
	'link_before'      => '',
	'link_after'       => '',
	'next_or_number'   => 'number',
	'separator'        => ' ',
	'nextpagelink'     => __( 'Next page', "maat-or-the-improved-bootstrap" ),
	'previouspagelink' => __( 'Previous page' , "maat-or-the-improved-bootstrap"),
	'pagelink'         => '%',
	'echo'             => 1
);

wp_link_pages( $defaults );

/**
 * Set Content width
 */
if ( ! isset( $content_width ) ) $content_width = 600;

/**
 * Editor styles
 **/
add_editor_style();

/**
 * Post thumbnails
 **/
add_theme_support( "post-thumbnails" );

/**
 * Costum header image
 * (the handbook sample sucks ... @link: https://developer.wordpress.org/themes/functionality/custom-headers/)
 * (trying: codex @link: https://codex.wordpress.org/Custom_Headers)
 **/
$args = array(
  'default-text-color'  => '000000',
	'width'         => 100,
	'height'        => 113,
	'default-image' => get_template_directory_uri() . '/images/maat_100x.png',
);
add_theme_support( 'custom-header', $args );

/**
 * Costum background or image
 */
$args = array(
	'default-color' => '000000',
	'default-image' => '%1$s/images/background.jpg',
);
add_theme_support( 'custom-background', $args );
?>
