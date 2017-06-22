<?php
/*
Template Name: Front
*/
?>

<?php get_header(); ?>

<!-- file: page.php -->
  <div class="row">
    <div id="text" class="col-lg-12">
      <!-- begin main loop -->
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <article id="article-<?php the_ID(); ?>"

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      	  <?php the_content(); ?>
        </div>

      </article>

      <?php endwhile; else: ?>

      	<p>Sorry, this post does not exist</p>

      <?php endif; ?><!-- end loop -->
  	</div>
  </div><!-- /row -->
</div><!-- /container -->
<!-- /page.php -->

<?php get_footer(); ?>
