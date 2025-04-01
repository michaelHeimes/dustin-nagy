<?php
$banner_slider_transition_delay = get_field('banner_slider_transition_delay') ?? null;
$banner_slides = get_field('banner_slides') ?? null;

if( $banner_slider_transition_delay || $banner_slides ):
?>
<div class="page-banner default-banner-slider position-relative overflow-hidden">
	<div class="swiper-wrapper">
		<?php foreach($banner_slides as $slide):
			$type = $slide['media_type'];
			$poster_url = '';	
		?>
			<div class="swiper-slide">
				<?php if( $type == 'image' && !empty( $slide['image'] ) ) {
					echo '<div class="img-wrap has-object-fit">';
					echo wp_get_attachment_image(  $slide['image']['id'], 'full', false, [ 'class' => '' ] );
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
		<?php endforeach;?>
	</div>
	<div class="swiper-btn swiper-button-prev">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.86 46.86"><g data-name="Group 6" transform="rotate(-90 23.43 23.43)"><circle cx="17.003" cy="17.003" transform="rotate(58 14.42 26.016)" fill="#231f20" r="17.003"/><path d="m31.235 28.532-7.807-7.788-7.8 7.788-2.4-2.4 10.2-10.2 10.2 10.2Z" fill="#f5ca20"/></g></svg>
	</div>
	<div class="swiper-btn swiper-button-next">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.86 46.86"><g data-name="Group 5" transform="rotate(-90 -1105.57 1801.65)"><circle cx="17.003" cy="17.003" r="17.003" transform="rotate(-58 2973.298 882.347)" fill="#231f20"/><path d="m680.455 2925.549-7.8 7.788-7.807-7.788-2.4 2.397 10.2 10.2 10.2-10.2Z" fill="#f5ca20"/></g></svg>
	</div>
</div>
<?php endif;?>