<?php

/**
 * Accordion Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accordion-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$media_slider_autoplay = get_field('media_slider_autoplay') ?? null;
$media_slider_transition_delay = get_field('media_slider_transition_delay') ?? null;
$media_slides = get_field('media_slides') ?? null;

if( $media_slides ){
    get_template_part('template-parts/part', 'media-slider',
        array(
            'media_slider_autoplay' => $media_slider_autoplay,
            'media_slider_transition_delay' => $media_slider_transition_delay,
            'media_slides' => $media_slides,
        ),
    );
}
?>