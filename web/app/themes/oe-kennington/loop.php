<?php
/**
 * The Maat Loop
 *
 * @package WordPress
 * @subpackage maat-or-the-improved-bootstrap
 * @since 1.0
 * @version 1.0
 *
 * It's a bit bloated. 
 * Cut to pieces?
 */
?>

<!-- begin main loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article id="article-<?php the_ID(); ?>" 
  <?php if(is_category('featured')): ?>class="featured-post"

  <?php endif; ?>>
  <a href="<?php the_permalink(); ?>" 
    title="<?php the_title_attribute(); ?>">
  	  <h3><?php the_title() ;?></h3>
  </a>

  <p class="theAuthor"><em>
    <?php the_author(); ?></em>
  </p>
  <figure class="theAvatar">
    <?php echo get_avatar($id); ?>
  </figure>
	<p>
		Published on <?php the_time('M j, Y'); ?> 
		by <?php the_category(', '); ?>
		in <?php the_category(', '); ?>
	</p>
  <div class="navLinks">
    <?php posts_nav_link(); ?>
  </div>
 
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	  <?php the_content(); ?>
  </div>

<!-- comments -->

  <?php comments_template(); ?>

<!-- /comments -->



<!-- tags -->
  <aside class="tags">
    <?php the_tags(); ?>
  </aside>
<!-- /tags -->

	<div class="prev-next-links">
		<ul>
			<li><?php next_post_link(); ?></li>
			<li><?php previous_post_link(); ?></li>
		</ul>

	</div>
  
</aside><!-- .theCommentsHere -->

</article>

<?php endwhile; else: ?>

	<p>Sorry, this post does not exist</p>

<?php endif; ?><!-- end loop -->
