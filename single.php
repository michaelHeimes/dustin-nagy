<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package trailhead
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			get_template_part('template-parts/section', 'post-footer-nav');

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
