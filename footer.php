<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trailhead
 */
 $footer_logo = get_field('footer_logo', 'option') ?? null;
 $copyright_text = get_field('footer_copyright_text', 'option') ?? null;
 $subfooter_links = get_field('footer_subfooter_links', 'option') ?? null;

 $footer_locations = get_field('global_footer_locations', 'option') ?? null;
 $footer_telephone_number = get_field('global_footer_telephone_number', 'option') ?? null;
 $footer_email_address = get_field('global_footer_email_address', 'option') ?? null;
 
?>
				<?php get_template_part('template-parts/part', 'pre-footer-cta');?>
				<footer id="colophon" class="site-footer bg-black">
					<div class="grid-container">
						<?php if( $footer_logo ):?>
							<div class="grid-x grid-padding-x align-center text-center">
								<div class="cell small-12">
									<a href="<?php echo home_url(); ?>">
										<?=wp_get_attachment_image( $footer_logo['id'], 'full', false, [ 'class' => '' ] );?>
									</a>
								</div>
							</div>
						<?php endif;?>
						<div class="footer-main grid-x grid-padding-x">
							<?php if( $footer_locations || $footer_telephone_number || $footer_email_address ):?>
								<div class="cell small-12 large-shrink">
									<?php if( $footer_locations ):?>
										<div class="locations">
											<?php foreach($footer_locations as $location):
												$title = $location['title'] ?? null;
												$address = $location['address'] ?? null;
												$directions_url = $location['directions_url'] ?? null;
											?>
												<div class="location">
													<?php if( $title ):?>
														<div class="h6">
															<?=esc_html($title);?>
														</div>
													<?php endif;?>
													<?php if( $address ):?>
														<div class="p">
															<?=wp_kses_post($address);?>
															<?php if( $directions_url ):?>
																<span>
																	<span>-</span>
																	<a href="<?=esc_url($directions_url);?>" target="_blank">
																		directions
																	</a>
																</span>
															<?php endif;?>
														</div>
													<?php endif;?>
												</div>
											<?php endforeach;?>
										</div>
										<?php if( $footer_telephone_number || $footer_email_address ):?>
											<div class="contact">
												<div class="h6">
													Contact
												</div>
												<?php if( $footer_telephone_number ):?>
													<div class="p">
														Tel: <a href="tel:<?=esc_html($footer_telephone_number);?>">
															<?=esc_html($footer_telephone_number);?>
														</a>
													</div>
												<?php endif;?>
												<?php if( $footer_email_address ):?>
													<div class="p">
														Email: <a href="mailto:<?=esc_html($footer_email_address);?>">
															<?=esc_html($footer_email_address);?>
														</a>
													</div>
												<?php endif;?>
											</div>
										<?php endif;?>
									<?php endif;?>
								</div>
							<?php endif;?>
							<div class="small-12 large-auto">
								<?php trailhead_top_nav();?>
							</div>
						</div>
					</div>
					<div class="site-info text-center tablet-text-left">
						<div class="grid-container fluid">
							<div class="grid-x grid-padding-x">
								<div class="cell small-12 tablet-auto">
									<p>
										&copy;<?= date("Y");?>
										<?php if( !empty( $copyright_text ) ){
											echo $copyright_text;	
										};?>
										<?php if( !empty($subfooter_links) ):
											$i = 1; foreach($subfooter_links as $subfooter_link):	
											$link = $subfooter_link['link'] ?? null;
												if( $link ): 
										?>
											<span>
												<?php if( $i >= 1 ):?>
													<span>|</span>
												<?php endif;?>
												<?php 
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
													?>
													<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
											</span>
										<?php endif; $i++; endforeach; endif;?>
									</p>
								</div>
								<div class="cell small-12 tablet-shrink">
									<p>
										Website by:
										<a class="uppercase" href="https://gopipedream.com/" target="_blank">
											Pipedream
										</a>
									</p>
								</div>
							</div>
						</div>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->
					
			</div><!-- #page -->
			
		</div>  <!-- end .off-canvas-content -->
							
	</div> <!-- end .off-canvas-wrapper -->
					
<?php wp_footer(); ?>

</body>
</html>
