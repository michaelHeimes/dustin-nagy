<?php

/**
 * Button Group Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'button-group';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$remove_top_spacing = get_field('remove_top_spacing') ?? null;
$remove_bottom_spacing = get_field('remove_bottom_spacing') ?? null;
$alignment = get_field('alignment') ?? null;
$button_links = get_field('button_links') ?? null;

?>
<section id="<?php echo esc_attr($id); ?>" class="module block 
    <?= esc_attr($className); 
        if($remove_top_spacing) { echo esc_attr( ' ntm' ); }
        if($remove_bottom_spacing) { echo esc_attr( ' nbm' ); }
    ?>
        
">

    <?php get_template_part('template-parts/part', 'button-group',
        array(
            'alignment' => $alignment,
            'button_links' => $button_links,
        ),
    );?>
    
</section>