<?php
/**
 * The Sidebar: widget area
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage maat-or-the-improved-bootstrap
 * @since 1.0
 * @version 1.0
 */
?>
<!-- sidebar.php -->

	<?php dynamic_sidebar( 'widget1' ); ?>

<!-- display all posts (testing, testing ...) -->
<h2> <?php _e("All Posts","maat-or-the-improved-bootstrap"); ?></h2>

<aside>
  <ul>
    <?php
    /**
     * Display all posts 
     */
    $lastposts = get_posts( array(
        'posts_per_page' => 999,
    ) );
     
    if ( $lastposts ) {
        foreach ( $lastposts as $post ) :
            setup_postdata( $post ); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php
        endforeach; 
        wp_reset_postdata();
    }
    ?>
  </ul>
</aside>
<!-- /sidebar.php -->
