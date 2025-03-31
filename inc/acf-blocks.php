<?php

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'accordion',
            'title'             => __('Block: Accordion'),
            'description'       => __('Block: Accordion'),
            'render_template'   => 'template-parts/blocks/accordion.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'custom', 'block', 'accordion', 'pmi' ),
        ));
        
        acf_register_block_type(array(
            'name'              => 'button-group',
            'title'             => __('Block: Button Group'),
            'description'       => __('Block: Button Group'),
            'render_template'   => 'template-parts/blocks/button-group.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'custom', 'block', 'button', 'buttons', 'group', 'pmi' ),
        ));

    }
}