<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage maat-or-the-improved-bootstrap
 * @since 1.0
 * @version 1.0
 */
?>
<!-- file: footer.php -->
		<div class="row">
			<footer class="col-lg-12 aligncenter">
				&copy; "The Maat Theme for WordPress" by Per Thykjaer Jensen.<br> The source code is copyrighted under the 
				<a href="http://www.gnu.org/licenses/gpl-3.0.en.html" target="_blank">GPLv3</a> Licence.<br> Use it to do what thou willt.
			</footer>
		</div><!-- /row -->

		<?php wp_footer(); ?>

		<script>
		// hide sticky
		$(".sticky").click(function(){
			  $(".sticky").hide(1000);
		});
		console.log( "Jquery up and running!");
		</script>
	</body>
</html>
