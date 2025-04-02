<?php
/**
 * Template name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();

$global_phone_number = get_field('global_phone_number', 'option') ?? null;
$global_request_info = get_field('global_request_info', 'option') ?? null;

$fields = get_fields();

$hero_headline = $fields['hero_headline'] ?? null;
$hero_button_link = $fields['hero_button_link'] ?? null;
$slider_transition_delay = $fields['hero_slider_transition_delay'] ?? null;
$slides = $fields['hero_slides'] ?? null;

$intro_heading = $fields['intro_heading'] ?? null;
$intro_image = $fields['intro_image'] ?? null;
$intro_copy = $fields['intro_copy'] ?? null;

$alternating_cta_repeater = $fields['alternating_cta_repeater'] ?? null;

$recent_projects_title = $fields['recent_projects_title'] ?? null;
$recent_projects_projects = $fields['recent_projects_projects'] ?? null;

?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();?>

		<?php if( $hero_headline || $hero_button_link || $slides ):?>
		<header class="entry-header page-banner hero-banner has-bg grid-x align-middle style-hero-slider position-relative bg-blue text-center yellow-bb">
			<div class="bg">
				<?php if( !empty( $slides ) ):?>
					<div class="bg-slider" data-delay="<?= esc_attr( $slider_transition_delay );?>">
						<div class="swiper-wrapper">
							<?php if( !empty( $slides ) ): $i = 1; foreach($slides as $slide):
								$type = $slide['media_type'];
								$poster_url = '';
							?>
								<div class="swiper-slide">
									<?php if( $type == 'image' && !empty( $slide['image'] ) ) {
										echo '<div class="img-wrap has-object-fit">';
										echo wp_get_attachment_image(  $slide['image']['id'], 'full', false, [ 'class' => 'img-fill' ] );
										echo '</div>';
									}?>
									<?php if( $type == 'video' && !empty( $slide['video_file'] ) ||  $type == 'video' && !empty( $slide['image'] ) ):
										$poster_url = $slide['image']['url'] ?? null;
									?>
										<div class="video-wrap has-object-fit">
											<video class="img-fill" width="1600" preload="none" height="900" muted loop playsinline preload="auto" poster="<?=esc_url($poster_url);?>">
											  <source src="<?= esc_url( $slide['video_file']['url'] );?>" type="video/mp4" />
											</video>
										</div>
									<?php endif;?>
								</div>
							<?php $i++; endforeach; endif;?>
						</div>
					</div>
				<?php endif;?>
				<div class="bg mask"></div>
			</div>
			<div class="small-12 content position-relative">
				<div class="grid-container">				
					<div class="grid-x grid-padding-x align-center">
						<div class="cell small-12 text-center">
							<?php if( !empty($hero_headline) ):;?>
								<h1 class="h2 color-white text-center">
									<?=wp_kses_post($hero_headline);?>
								</h1>
							<?php endif;?>
							<?php if( $hero_button_link ):
								$link = $hero_button_link;
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';		
							?>
								<a class="button icon-btn grid-x inline-flex align-middle" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
									<span><?php echo esc_html( $link_title ); ?></span>
									<svg xmlns="http://www.w3.org/2000/svg" width="27.559" height="27.559" viewBox="0 0 27.559 27.559"><g data-name="Group 1" transform="rotate(-90 -1115.22 1792)"><circle cx="10" cy="10" r="10" transform="rotate(-58 2962.582 876.407)" fill="#f5cd20"/><path d="m667.59 2918-4.59 4.58-4.59-4.58-1.41 1.41 6 6 6-6Z" fill="#231f20"/></g></svg>
								</a>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?php endif;?>
		
		<?php if( $intro_heading || $intro_image || $intro_copy ):?>
		<section class="intro yellow-bb">
			<div class="grid-container">
				<div class="grid-x grid-padding-x align-center">
					<?php if( $intro_heading || $intro_image ):?>
						<div class="cell small-12 medium-6 tablet-5">
							<?php if( $intro_heading ):?>
								<h1><?=esc_html($intro_heading);?></h1>
							<?php endif;?>
							<?php if( $intro_image ):?>
								<div class="img-wrap">
									<?=wp_get_attachment_image( $intro_image['id'], 'full', false, [ 'class' => '' ] );?>
								</div>
							<?php endif;?>
						</div>
					<?php endif;?>
					<?php if( $intro_copy ):?>
						<div class="cell small-12 medium-6 tablet-5">
							<?=wp_kses_post($intro_copy);?>
							<?php get_template_part('template-parts/part', 'global-cta',
								array(
									'global_phone_number' => get_field('global_phone_number', 'option'),
									'global_request_info' => get_field('global_request_info', 'option'),
									'global_rfq_link' => '',
									'container_classes' => 'align-center weight-regular',
								),
							);?>
						</div>
					<?php endif;?>
				</div>
			</div>
		</section>
		<?php endif;?>
		
		<?php if( $alternating_cta_repeater ):?>
		<section class="alternating-ctas yellow-bb">
			<?php $i = 1; foreach($alternating_cta_repeater as $row):
				$background_image = $row['background_image'] ?? null;	
				$heading = $row['heading'] ?? null;	
				$text = $row['text'] ?? null;	
				$button_link = $row['button_link'] ?? null;	
			?>
				<div class="cta-row bg-black has-object-fit<?php if($i % 2 == 0) { echo ' odd';};?>">
					<?php if( $background_image ):?>
						<div class="img-wrap">
							<?=wp_get_attachment_image( $background_image['id'], 'full', false, [ 'class' => 'img-fill' ] );?>
						</div>
					<?php endif;?>
					<?php if( $heading || $text || $button_link  ):?>
						<div class="bg text-bg"></div>
						<div class="grid-container">
							<div class="grid-x position-relative
							<?php if($i % 2 == 0) {
								echo ' align-right';
							} else {
								echo ' odd';
							}
							;?>
							">
								<div class="cell small-12 medium-6 text-wrap">
									<div class="position-relative">
										<?php if( $heading ):?>
											<h2 class="color-yellow">
												<?=wp_kses_post($heading);?>
											</h2>
										<?php endif;?>
										<?php if( $text ):?>
											<div class="color-white">
												<?=wp_kses_post($text);?>
											</div>
										<?php endif;?>
										<?php if( $button_link ):
											$link = $button_link;
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';		
										?>
										<div class="btn-wrap">
											<a class="button bg-yellow icon-btn grid-x inline-flex align-middle" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
												<span><?php echo esc_html( $link_title ); ?></span>
												<svg xmlns="http://www.w3.org/2000/svg" width="27.559" height="27.559" viewBox="0 0 27.559 27.559"><g data-name="Group 1" transform="rotate(-90 -1115.22 1792)"><circle cx="10" cy="10" r="10" transform="rotate(-58 2962.582 876.407)" fill="#f5cd20"/><path d="m667.59 2918-4.59 4.58-4.59-4.58-1.41 1.41 6 6 6-6Z" fill="#231f20"/></g></svg>
											</a>
										</div>
										<?php endif;?>
									</div>
								</div>
							</div>
						</div>
					<?php endif;?>
				</div>
			<?php $i++; endforeach;?>
		</section>
		<?php endif;?>
		
		<?php 
		// If no projects are selected in the ACF relationship field, fetch recent projects from the 'pm-project' post type.
		if (empty($recent_projects_projects)) {
			$args = array(
				'post_type'      => 'pm-project',
				'posts_per_page' => -1,
				'orderby'        => 'date',
				'order'          => 'DESC',
			);
			$recent_projects_query = new WP_Query($args);
			$recent_projects_projects = $recent_projects_query->have_posts() ? $recent_projects_query->posts : [];
		}
		?>
		
		<?php if ($recent_projects_title || !empty($recent_projects_projects)) : ?>
			<section class="recent-projects">
				<?php if ($recent_projects_title): ?>
					<div class="header-wrap text-center" style="background: #231F20 url(<?= get_template_directory_uri(); ?>/assets/images/recent-project-bg-img.png)">
						<div class="grid-container">
							<h2 class="color-yellow"><?= esc_html($recent_projects_title); ?></h2>
						</div>
					</div>
				<?php endif; ?>
		
				<?php if (!empty($recent_projects_projects)): ?>
					<div class="projects-slider-wrap bg-yellow">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-middle">
								<div class="cell shrink">
									<div class="swiper-btn swiper-button-prev">
										<svg xmlns="http://www.w3.org/2000/svg" width="46.86" height="46.86" viewBox="0 0 46.86 46.86"><g data-name="Group 6" transform="rotate(-90 23.43 23.43)"><circle cx="17.003" cy="17.003" transform="rotate(58 14.42 26.016)" fill="#231f20" r="17.003"/><path d="m31.235 28.532-7.807-7.788-7.8 7.788-2.4-2.4 10.2-10.2 10.2 10.2Z" fill="#f5ca20"/></g></svg>
									</div>
								</div>
								<div class="cell auto projects-slider position-relative overflow-hidden">
									<div class="swiper-wrapper">
										<?php foreach ($recent_projects_projects as $project): 
											$thumb = get_the_post_thumbnail($project->ID, 'full', array( 'class' => 'img-fill' )) ?? null;  
											$excerpt = get_the_excerpt($project->ID);
										?>
											<article id="post-<?= esc_attr($project->ID); ?>" <?php post_class('swiper-slide text-center', $project->ID); ?>>
												<a class="position-relative grid-x flex-dir-column align-middle align-center" href="<?= get_permalink($project->ID); ?>">
													<div class="thumb-wrap has-object-fit">
														<?= $thumb ? $thumb : ''; ?>
													</div>
													<h3 class="show-for-sr"><?= esc_html(get_the_title($project->ID)); ?></h3>
													<div class="position-relative text-link text-center">
														<p><b><?= esc_html($excerpt); ?></b></p>
														<div class="view-link color-yellow uppercase grid-x align-middle align-center">
															View Project
															<img src="<?= get_template_directory_uri(); ?>/assets/images/project-link-chevron.svg" alt="chevron right">
														</div>
													</div>
													<img class="accent z-1" src="<?= get_template_directory_uri(); ?>/assets/images/recent-project-card-arrow.svg" alt="chevron up">
												</a>
											</article>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="cell shrink">
									<div class="swiper-btn swiper-button-next">
										<svg xmlns="http://www.w3.org/2000/svg" width="46.86" height="46.86" viewBox="0 0 46.86 46.86"><g data-name="Group 5" transform="rotate(-90 -1105.57 1801.65)"><circle cx="17.003" cy="17.003" r="17.003" transform="rotate(-58 2973.298 882.347)" fill="#231f20"/><path d="m680.455 2925.549-7.8 7.788-7.807-7.788-2.4 2.397 10.2 10.2 10.2-10.2Z" fill="#f5ca20"/></g></svg>
									</div>
								</div>
							</div>
						</div>
						<div class="view-all-wrap grid-container text-center">
							<a class="button icon-btn grid-x inline-flex align-middle" href="/projects/" target="_self">
								<span>View All Projects</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="27.559" height="27.559" viewBox="0 0 27.559 27.559"><g data-name="Group 1" transform="rotate(-90 -1115.22 1792)"><circle cx="10" cy="10" r="10" transform="rotate(-58 2962.582 876.407)" fill="#f5cd20"></circle><path d="m667.59 2918-4.59 4.58-4.59-4.58-1.41 1.41 6 6 6-6Z" fill="#231f20"></path></g></svg>
							</a>
						</div>
					</div>
				<?php endif; ?>
			</section>
		<?php endif; ?>
		
		<?php if (isset($recent_projects_query)) wp_reset_postdata(); // Reset WP_Query if used ?>

		
		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();