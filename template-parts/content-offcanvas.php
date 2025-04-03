<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: https://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas position-right" id="off-canvas" data-off-canvas data-transition="overlap">

	<div class="inner">
	
		<?php trailhead_off_canvas_nav(); ?>
		
		<?php get_template_part('template-parts/part', 'global-cta',
			array(
				'global_phone_number' => get_field('global_phone_number', 'option'),
				'global_request_info' => get_field('global_request_info', 'option'),
				'global_rfq_link' => '',
				'container_classes' => 'flex-dir-column align-center weight-regular',
				'btn_classes' => 'bg-yellow',
			),
		);?>

				
	</div>

	<?php if ( is_active_sidebar( 'offcanvas' ) ) : ?>

		<?php dynamic_sidebar( 'offcanvas' ); ?>

	<?php endif; ?>

</div>
