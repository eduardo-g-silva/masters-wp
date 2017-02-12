<?php
/**
 * The header 
 *
 * This is the template that displays all of the <head> section and everything till the menu is included.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage maat-or-the-improved-bootstrap
 * @since 1.0
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="generator" content="Bluefish 2.2.5" >

	<!-- Theme: "MAAT or the improved Booystrap" a didactic theme by Per Thykjaer Jensen, 2015 -->

	<!-- SEO (should be improved by a hook) -->
	<meta name="author" content="Per Thykjaer Jensen" >
	<meta name="date" content="2016-05-29T19:22:50+0200" >
	<meta name="copyright" content="GPLv3">
	<meta name="description" 
    content="<?php echo get_bloginfo('name') . ": " . get_bloginfo('description'); ?>">

	<!-- scale bootstrap to device size -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- pings -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<div class="container">
  <div class="row">
		<header class="col-lg-12 col-md-12 col-xs-12">
			<section>
				<a href="<?php echo home_url(); ?>">
					<img 
		        alt="" src="<?php header_image(); ?>" 
		        width="<?php echo get_custom_header()->width; ?>" 
		        height="<?php echo get_custom_header()->height; ?>">

					<h1 id="logo"> <?php echo get_bloginfo('name'); ?></h1>
					<h2 id="description"><?php echo get_bloginfo('description'); ?></h2>
				</a><!-- all link to home -->
			</section>
		</header>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<?php get_template_part("menu"); // get the menu ?>
		</div>
	</div>

<!-- /header.php -->
