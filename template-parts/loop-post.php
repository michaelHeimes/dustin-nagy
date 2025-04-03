<?php
/**
 * Template part for displaying posts in an archive grid
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */
$excerpt = get_the_excerpt();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card cell'); ?>>
	<a class="color-black grid-x flex-dir-column align-justify height-100" href="<?=esc_url( get_permalink() );?>" rel="bookmark">
		<div>
			<div class="thumb-wrap">
				<?php the_post_thumbnail('post-card'); ?>
			</div>
			
			<div>
				<header class="entry-header">
					<?php
						the_title( '<h2 class="h4 entry-title color-black">', '</h2>' );
					?>
				</header><!-- .entry-header -->
				<?php if( $excerpt ):?>
					<section class="excerpt">
						<p>
							<?=wp_kses_post( wp_trim_words($excerpt, 25) );?>
						</p>
					</section>
				<?php endif;?>
			</div>
		</div>
		<footer class="entry-footer weight-regular">
			<div class="button text-center">
				Learn More
			</div>
		</footer><!-- .entry-footer -->
	</a>
</article><!-- #post-<?php the_ID(); ?> -->