<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package trailhead
 */

get_header();

$content_404 = get_field('content_404', 'option') ?? null;

?>
	<div class="content bg-white-gradient">
		<div class="grid-container">
			<div class="inner-content grid-x grid-padding-x align-center">
				<div class="cell small-12 tablet-11 large-10">
					<main id="primary" class="site-main">
				
						<article class="content-not-found entry-content">
							
							<?php if( $content_404 ) :?>
								<?=wp_kses_post( $content_404 );?>
							<?php else:?>
						
							<header class="article-header">
								<h1>404</h1>
							</header> <!-- end article header -->
						
							<section>
								<p>The page you're looking for doesn't exist. Please use the navigation at the top of the page or <a href="<?php echo home_url(); ?>">return to the home page.</a></p>
							</section> <!-- end article section -->
							
							<?php endif;?>
						
						
						</article> <!-- end article -->
				
					</main><!-- #main -->
				</div>
			</div>
		</div>
	</div><!-- end content -->

<?php
get_footer();
