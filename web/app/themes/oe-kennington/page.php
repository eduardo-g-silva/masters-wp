<?php
/**
 * Page: display a page
 *
 * @package WordPress
 * @subpackage maat-or-the-improved-bootstrap
 * @since 1.0
 * @version 1.0
 * 
 * The page is full-width and no sidebar.
 */
?>

<?php get_header(); ?>

<!-- file: page.php -->
  <div class="row">
    <div id="text" class="col-lg-12">
      <?php get_template_part('loop'); // the main loop ?>
  	</div>
  </div><!-- /row -->
</div><!-- /container -->
<!-- /page.php -->

<?php get_footer(); ?>
