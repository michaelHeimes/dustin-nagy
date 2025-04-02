<?php
$pre_footer_background_image = get_field('pre_footer_background_image', 'option') ?? null;
$pre_footer_heading = get_field('pre_footer_heading', 'option') ?? null;

if( $pre_footer_background_image || $pre_footer_heading  ):
?>
<section class="pre-footer-cta has-object-fit yellow-bb">
	<?=wp_get_attachment_image( $pre_footer_background_image['id'], 'full', false, [ 'class' => 'img-fill' ] );?>
	<div class="grid-container text-center position-relative z-1">
		<div class="inner grid-x align-center">
			<?php if( $pre_footer_heading ):?>
				<div class="cell small-12">
					<h2 class="color-yellow">
						<?=wp_kses_post( $pre_footer_heading );?>
					</h2>
				</div>
			<?php endif;?>
			<?php get_template_part('template-parts/part', 'global-cta',
				array(
					'global_phone_number' => get_field('global_phone_number', 'option'),
					'global_request_info' => get_field('global_request_info', 'option'),
					'global_rfq_link' => '',
					'container_classes' => 'align-center weight-medium',
					'btn_classes' => 'bg-yellow',
				),
			);?>
		</div>
	</div>
</section>
<?php endif;?>