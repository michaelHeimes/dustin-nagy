<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: https://jointswp.com/docs/off-canvas-menu/
 */
 $global_phone_number = get_field('global_phone_number', 'option') ?? null;
?>

<div class="top-bar-wrap grid-container fluid">

	<div class="top-bar fixed show-for-tablet">
	
		<div class="top-bar-left float-left">
			
			<div class="site-branding show-for-sr">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$trailhead_description = get_bloginfo( 'description', 'display' );
				if ( $trailhead_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $trailhead_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		
			<ul class="menu">
				<li class="logo"><a href="<?php echo home_url(); ?>">
					<?php 
					$image = get_field('header_logo', 'option');
					if( !empty( $image ) ): ?>
						<?=wp_get_attachment_image( $image['id'], 'full', false, [ 'class' => '' ] );?>
					<?php endif; ?>
				</a></li>
			</ul>
						
		</div>
		<div class="top-bar-right show-for-tablet">
			<div class="grid-x align-right">
				<div class="cell shrink">
					<?php get_template_part('template-parts/part', 'global-cta',
						array(
							'global_phone_number' => get_field('global_phone_number', 'option'),
							'global_request_info' => get_field('global_request_info', 'option'),
							'global_rfq_link' => get_field('global_rfq_link', 'option'),
							'container_classes' => 'align-right weight-regular',
							'btn_classes' => 'bg-yellow',
						),
					);?>
				</div>
			</div>
		</div>
		<div class="menu-toggle-wrap top-bar-right float-right hide-for-tablet">
			<ul class="menu">
				<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
				<li><a id="menu-toggle" data-toggle="off-canvas"><span></span><span></span><span></span></a></li>
			</ul>
		</div>
	</div>
	
	<div class="top-bar load">
	
		<div class="top-bar-left float-left">
			
			<div class="site-branding show-for-sr">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$trailhead_description = get_bloginfo( 'description', 'display' );
				if ( $trailhead_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $trailhead_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		
			<ul class="menu">
				<li class="logo"><a href="<?php echo home_url(); ?>">
					<?php 
					$image = get_field('header_logo', 'option');
					if( !empty( $image ) ): ?>
						<?=wp_get_attachment_image( $image['id'], 'full', false, [ 'class' => 'style-svg' ] );?>
					<?php endif; ?>
				</a></li>
			</ul>
						
		</div>
		<div class="top-bar-right show-for-tablet">
			<div class="grid-x align-right">
				<div class="cell shrink">
					<?php 
					if ( is_page_template('page-templates/page-home.php') ) {
						get_template_part('template-parts/part', 'global-cta', array(
							'global_phone_number' => get_field('global_phone_number', 'option'),
							'global_request_info' => get_field('global_request_info', 'option'),
							'global_rfq_link' => get_field('global_rfq_link', 'option'),
							'container_classes' => 'align-right weight-regular',
						));
					} else {
						get_template_part('template-parts/part', 'global-cta', array(
							'global_phone_number' => get_field('global_phone_number', 'option'),
							'global_request_info' => get_field('global_request_info', 'option'),
							'global_rfq_link' => get_field('global_rfq_link', 'option'),
							'container_classes' => 'align-right weight-regular',
							'btn_classes' => 'bg-yellow',
						));
					}
					?>
					<?php trailhead_top_nav();?>
				</div>
			</div>
		</div>
		<div class="menu-toggle-wrap top-bar-right float-right hide-for-tablet">
			<ul class="menu">
				<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
				<li><a id="menu-toggle" data-toggle="off-canvas"><span></span><span></span><span></span></a></li>
			</ul>
		</div>
	</div>
	<div class="grid-container hide-for-tablet">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12 text-right">
				<?php if( $global_phone_number ):
					$link = $global_phone_number;
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';	
				?>
					<div class="cell shrink">
						<a class="header-phone color-yellow p" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>