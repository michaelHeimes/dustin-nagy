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

if( $media_slider_transition_delay || $media_slides ):
?>
<div class="module block media-slider overflow-hidden position-relative" data-autoplay="<?=esc_attr($media_slider_autoplay);?>" data-delay="<?= esc_attr( $media_slider_transition_delay );?>">
    <div class="swiper-wrapper">
        <?php foreach($media_slides as $slide):
            $type = $slide['media_type'];
            $poster_url = '';	
        ?>
            <div class="swiper-slide">
                <?php if( $type == 'image' && !empty( $slide['image'] ) ) {
                    echo '<div class="img-wrap has-object-fit">';
                    echo wp_get_attachment_image( $slide['image']['id'], 'full', false, [ 'class' => '' ] );
                    echo '</div>';
                }?>
                <?php if( $type == 'video' && !empty( $slide['video'] ) ):
                ?>
                    <div class="video-wrap responsive-embed widescreen">
                        <?php
                            $iframe = $slide['video'];
                        
                            // Use preg_match to find iframe src.
                            preg_match('/src="(.+?)"/', $iframe, $matches);
                            $src = $matches[1];
                        
                            // Add extra parameters to src and replace HTML.
                            $params = array(
                                'autoplay'    => 0,
                                'muted'       => 0,
                                'loop'        => 0,
                                'background'  => 0,
                                'controls'    => 1,
                                'title'       => 0,
                                'byline'      => 0,
                                'portrait'    => 0,
                                'playsinline' => 1,
                                'dnt'         => 1,
                                'responsive'  => 1,
                            );
                            $new_src = add_query_arg($params, $src);
                            $iframe = str_replace($src, $new_src, $iframe);
                        
                            // Add extra attributes to iframe HTML.
                            $attributes = 'frameborder="0"';
                            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
                        
                            // Display customized HTML.
                            echo $iframe;
                        ?>
                    </div>
                <?php endif;?>
            </div>
        <?php endforeach;?>
    </div>
    <div class="swiper-btn swiper-button-prev">
        <svg xmlns="http://www.w3.org/2000/svg" width="90.688" height="90.688" viewBox="0 0 90.688 90.688"><defs><filter id="a" x="0" y="0" width="90.688" height="90.688" filterUnits="userSpaceOnUse"><feOffset dy="2"/><feGaussianBlur stdDeviation="2.5" result="blur"/><feFlood flood-opacity=".835"/><feComposite operator="in" in2="blur"/><feComposite in="SourceGraphic"/></filter></defs><g data-name="Group 382"><g transform="translate(0 -.002)" filter="url(#a)"><circle data-name="ic_brightness_1_24px" cx="27.463" cy="27.463" transform="rotate(-31.8 64.167 4.01)" fill="#f5ce1f" r="27.463"/></g><path d="M53.584 30.739 41.005 43.345l12.579 12.606-3.873 3.872-16.478-16.478 16.478-16.478Z" fill="#231f20"/></g></svg>
    </div>
    <div class="swiper-btn swiper-button-next">
        <svg xmlns="http://www.w3.org/2000/svg" width="90.688" height="90.688" viewBox="0 0 90.688 90.688"><defs><filter id="a" x="0" y="0" width="90.688" height="90.688" filterUnits="userSpaceOnUse"><feOffset dy="2"/><feGaussianBlur stdDeviation="2.5" result="blur"/><feFlood flood-opacity=".839"/><feComposite operator="in" in2="blur"/><feComposite in="SourceGraphic"/></filter></defs><g data-name="Group 381"><g transform="translate(0 -.002)" filter="url(#a)"><circle data-name="ic_brightness_1_24px" cx="27.464" cy="27.464" r="27.464" transform="rotate(-148.2 38.634 32.818)" fill="#f5ce1f"/></g><path d="m37.105 30.738 12.578 12.606L37.105 55.95l3.872 3.872 16.479-16.478-16.479-16.478Z" fill="#231f20"/></g></svg>
    </div>
</div>
<?php endif;?>