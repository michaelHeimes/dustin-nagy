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

$fields = get_fields();

$hero_headline = $fields['hero_headline'] ?? null;
$hero_button_link = $fields['hero_button_link'] ?? null;
$slider_transition_delay = $fields['hero_slider_transition_delay'] ?? null;
$slides = $fields['hero_slides'] ?? null;

?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();?>

		<?php if( $hero_headline || $hero_button_link || $slides ):?>
		<header class="entry-header page-banner hero-banner has-bg grid-x align-middle style-hero-slider bg-blue text-center">
			<div class="bg">
				<div class="accent-wrap"></div>
				<?php if( !empty( $slides ) ):?>
					<div class="bg-slider" data-delay="<?= esc_attr( $slider_transition_delay );?>">
						<div class="swiper-wrapper">
							<?php if( !empty( $slides ) ): $i = 1; foreach($slides as $slide):
								$type = $slide['media_type'];
							?>
								<div class="swiper-slide">
									<?php if( $type == 'image' && !empty( $slide['image'] ) ) {
										$imgID = $slide['image']['ID'];
										$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
										$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
										echo '<div class="img-wrap">';
										echo $img;
										echo '</div>';
									}?>
									<?php if( $type == 'video' && !empty( $slide['video_file'] ) ):?>
										<div class="video-wrap">
											<video width="1600" preload="none" height="900" playsinline loop muted>
											  <source src="<?= esc_url( $slide['video_file']['url'] );?>" type="video/mp4" />
											</video>
										</div>
									<?php endif;?>
								</div>
							<?php $i++; endforeach; endif;?>
						</div>
						<?php if( !empty( $slides ) && count($slides) > 1 ):?>
							<div class="grid-container pagination-container position-relative">
								<div class="grid-x grid-padding-x align-center">
									<div class="cell small-12">
										<div class="position-relative">
											<div class="swiper-pagination"></div>
										</div>
									</div>
								</div>
							</div>
						<?php endif;?>
					</div>
				<?php endif;?>
			</div>
			<div class="small-12 content position-relative">
				<div class="grid-container">				
					<div class="grid-x grid-padding-x align-center">
						<div class="cell small-12 text-center">
							<?php if( !empty($hero_headline) ):;?>
								<h2 class="color-white text-center">
									<?=wp_kses_post($hero_headline);?>
								</h2>
							<?php endif;?>
							<?php if( $hero_button_link ):
								$link = $hero_button_link;
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';		
							?>
								<a class="button grid-x inline-flex" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
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

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();