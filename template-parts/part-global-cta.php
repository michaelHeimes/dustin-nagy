<?php
$global_phone_number = $args['global_phone_number'] ?? null;
$global_request_info = $args['global_request_info'] ?? null;
$global_rfq_link = $args['global_rfq_link'] ?? null;
$container_classes = $args['container_classes'] ?? null;
$btn_classes = $args['btn_classes'] ?? null;
?>
<div class="global-ctas grid-x grid-padding-x align-middle <?=esc_attr( $container_classes );?>">
	<?php if( $global_phone_number ):
		$link = $global_phone_number;
		$link_url = $link['url'];
		$link_title = $link['title'];
		$link_target = $link['target'] ? $link['target'] : '_self';	
	?>
		<div class="link-wrap cell shrink">
			<a class="button <?=esc_attr($btn_classes);?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
		</div>
	<?php endif;?>
	<?php if( $global_request_info ):
		$link = $global_request_info;
		$link_url = $link['url'];
		$link_title = $link['title'];
		$link_target = $link['target'] ? $link['target'] : '_self';	
	?>
		<div class="link-wrap cell shrink">
			<a class="button <?=esc_attr($btn_classes);?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
		</div>
	<?php endif;?>
	<?php if( $global_rfq_link):
		$link = $global_rfq_link;
		$link_url = $link['url'];
		$link_title = $link['title'];
		$link_target = $link['target'] ? $link['target'] : '_self';	
	?>
		<div class="rfw-link-wrap link-wrap cell shrink grid-x align-middle">
			<span></span>
			<a class="rfw-link uppercase" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
		</div>
	<?php endif;?>
</div>