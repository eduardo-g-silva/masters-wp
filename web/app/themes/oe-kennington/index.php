<?php
/**
 * The index
 *
 * @package WordPress
 * @subpackage maat-or-the-improved-bootstrap
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<!-- index.php -->
<!-- div class="container" : begins in header.php-->
  <div class="row">
    <div class="col-lg-8 col-md-9 col-xs-12">
      <?php get_template_part('loop'); ?>
		</div>

		<aside id="sidebar" class="col-lg-4 col-md-3 col-xs-12">
			<?php get_sidebar(); ?>
		</aside>

  </div><!-- /row -->
</div><!-- /container -->
<!-- /index.php -->

<?php get_footer(); ?>
