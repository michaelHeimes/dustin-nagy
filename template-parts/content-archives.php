<?php
$page_id = '';
$title = '';
$post_content = '';

if( is_home() ) {
	$page_id = get_option('page_for_posts');
	$media_slider_autoplay = get_field('media_slider_autoplay', $page_id) ?? null;
	$media_slider_transition_delay = get_field('media_slider_transition_delay', $page_id) ?? null;
	$media_slides = get_field('media_slides', $page_id) ?? null;
	$post_content = get_post_field( 'post_content', $page_id ) ?? null;
} else {
	$page_id = get_queried_object() ?? null;
	$media_slider_autoplay = get_field('media_slider_autoplay', $page_id) ?? null;
	$media_slider_transition_delay = get_field('media_slider_transition_delay', $page_id) ?? null;
	$media_slides = get_field('media_slides', $page_id) ?? null;
	$title = get_the_archive_title();	
	$term_desc = $page_id->category_description ?? null;
	if( $term_desc ) {
		$post_content = wpautop( $page_id->category_description ) ?? null;
	}
	if( $page_id->name == 'pm-project' ) {
		$projects_archive_slider_group = get_field('project_archive_media_slider', 'option') ?? null;
		$post_content = get_field('project_archive_intro_copy', 'option') ?? null;
		if($projects_archive_slider_group) {
			$media_slider_autoplay = $projects_archive_slider_group['media_slider_autoplay'] ?? null;
			$media_slider_transition_delay = $projects_archive_slider_group['media_slider_transition_delay'] ?? null;
			$media_slides = $projects_archive_slider_group['media_slides'] ?? null;
		}
	}
}


?>

	<main id="primary" class="site-main">
		<div class="blog-primary">
			<div class="grid-container">
				<div class="grid-x grid-padding-x align-center">
					<div class="cell small-12 tablet-11 large-10">
						<?php
						if( $media_slides ){
							get_template_part('template-parts/part', 'media-slider',
								array(
									'media_slider_autoplay' => $media_slider_autoplay,
									'media_slider_transition_delay' => $media_slider_transition_delay,
									'media_slides' => $media_slides,
								),
							);
						}
						?>
						<div class="grid-intro entry-content<?php if( empty($media_slides) ):?> no-slider<?php endif;?>">
							<?php if( !empty($post_content) ):?>
								<?=wp_kses_post($post_content);?>
							<?php else:?>
								<h1><?=wp_kses_post( $title );?></h1>
							<?php endif;?>
						</div>
						<?php
						if ( have_posts() ) :?>
							
							<?php
							echo '<div class="posts-grid grid-x grid-padding-x card-grid small-up-1 medium-up-2 tablet-up-3">';
	
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
					
									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */
										get_template_part( 'template-parts/loop', 'post' );
								endwhile;
							
							echo '</div>';
							
							echo '<div class="grid-x grid-padding-x align-center">';
								echo '<div class="inner cell small-12 medium-10 tablet-4 position-relative font-header uppercase">';
									trailhead_page_navi();
								echo '</div>';
							echo '</div>';
				
						else :
				
							get_template_part( 'template-parts/content', 'none' );
				
						endif;
						?>
						
						<?php 
							if( get_post_type() == 'post' ) {
								get_template_part('template-parts/part', 'post-footer-nav');
							}
						?>
						
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->