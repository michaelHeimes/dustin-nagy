<?php
function add_custom_sizes() {
	add_image_size( 'post-card', 650, 650, true );
}
add_action('after_setup_theme','add_custom_sizes');