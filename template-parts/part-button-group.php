<?php
$alignment = $args['alignment'] ?? null;
$button_links = $args['button_links'] ?? null;
?>	
<div class="btns-group grid-x grid-padding-x <?= esc_attr( $alignment );?>">
	<?php foreach($button_links as $button_link):
		$style = $button_link['style'] ?? null;
		$add_phone_icon = $button_link['add_phone_icon'] ?? null;
		$link = $button_link['link'] ?? null;
	?>
		<?php 
		if( $link ): 
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
		<div class="cell shrink">
			<a class="button grid-x align-center<?php if ($style == 'transparent') { echo ' no-bg'; }; if ($style == 'mint-border') { echo ' border'; };?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
				<?php if ($style == 'transparent' && $add_phone_icon == 'true' ):?>
					<svg xmlns="http://www.w3.org/2000/svg" width="13.132" height="22.223"><path d="M10.606 0H2.525A2.526 2.526 0 0 0 0 2.525V19.7a2.526 2.526 0 0 0 2.525 2.525h8.081a2.526 2.526 0 0 0 2.526-2.525V2.525A2.526 2.526 0 0 0 10.606 0Zm-4.04 21.213A1.515 1.515 0 1 1 8.081 19.7a1.513 1.513 0 0 1-1.515 1.513Zm4.546-4.041H2.02V3.03h9.091Z" fill="#1b9e8f"></path></svg>
				<?php endif; ?>
				<span><?php echo esc_html( $link_title ); ?></span>
			</a>
		</div>
		<?php endif; ?>
	<?php endforeach;?>
</div>