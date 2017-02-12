<?php 
/**
 * Single.php: display a single page or post
 *
 * @package WordPress
 * @subpackage maat-or-the-improved-bootstrap
 * @since 1.0
 * @version 1.0
 * @link: https://codex.wordpress.org/The_Loop_in_Action
 */
?>

<?php get_header(); ?>

<!-- single.php -->
<!-- div class="container" : begins in header.php-->
  <div class="row">
    <div class="col-lg-8 col-md-9 col-xs-12 theContent">
			<!-- single loop -->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<!-- title, author, date, etc. -->
			<h2 id="post-<?php the_ID(); ?>">
			<a 
				href="<?php the_permalink() ?>" 
				rel="bookmark" 
				title="Permanent Link to <?php the_title_attribute(); ?>">
			<?php the_title(); ?></a></h2>
			<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

			<div class="theContent">
				<?php the_content(); ?>
			</div><!-- ends theContent -->		

			<div class="additionalDetails">

				<p class="postmetadata">
					Posted in <?php the_category(', ') ?> 
				<?php edit_post_link('Edit',' ',' '); ?>  
				<?php comments_popup_link(
					'No Comments ', 
					'1 Comment ', 
					'% Comments '); ?></p>

			</div><!-- .additionalDetails -->

			<!-- <?php trackback_rdf(); ?> -->

			<?php endwhile; // ends the loop
			endif; // ends "if have posts"
			?>

<!-- comments -->

<?php if ( have_comments() ) : ?>
	<h3 id="comments-title"><?php
		printf(
			_n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'maat-or-the-improved-bootstrap' ),
			number_format_i18n( get_comments_number() ),
			'<em>' . get_the_title() . '</em>' 
		);
	?></h3>
// [and more, of course...]
<?php else : // or, if we don't have comments:
	if ( ! comments_open() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'maat-or-the-improved-bootstrap' ); ?></p>
	<?php endif; // end ! comments_open() ?>
<?php endif; // end have_comments() ?>

<!-- /comments -->

		</div><!-- .theContent -->

		<div id="sidebar" class="col-lg-4 col-md-3 col-xs-12">
			<?php get_sidebar(); ?>
		</aside>

  </div><!-- /row -->
</div><!-- /container -->
<!-- /index.php -->

<?php get_footer(); ?>
