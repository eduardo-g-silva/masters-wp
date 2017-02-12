<?php 
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage maat-or-the-improved-bootstrap
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container">
  <div class="row">

<div id="text" class="col-lg-4 col-md-4 col-xs-12">
  <h3><?php _e(
    "Error", 
    "maat-or-the-improved-bootstrap"); ?>
  </h3>
  <p>
    <?php _e(
      "That page does not exist.",
      "maat-or-the-improved-bootstrap"); ?>
  </p>
 </div>

<aside id="notFound" class="col-lg-4 col-md-4 col-xs-12">
  <?php get_search_form(); ?>
</aside>

<aside id="notFound" class="col-lg-4 col-md-4 col-xs-12">
  <h2><?php _e(
    "Recent Posts", 
    "maat-or-the-improved-bootstrap"); ?>
  </h2>
  <ul>
  <?php
	  $args = array( 'numberposts' => '3' );
	  $recent_posts = wp_get_recent_posts( $args );
	  foreach( $recent_posts as $recent ){
		  echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
	  }
	  wp_reset_query();
  ?>
  </ul>
</aside>

</div><!-- /row -->
</div><!-- /container -->
<?php get_footer(); ?>
