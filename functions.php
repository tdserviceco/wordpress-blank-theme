<?php
$activate_slick = get_field('slick-bool', 'options');
add_action( 'wp_enqueue_scripts', 'markups' );
add_action( 'acf/init', 'my_acf_init' );        

function markups() {
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js' , array('jquery') , true );
}

if ($activate_slick === 1) {
    ad_action( 'wp_enqueue_scripts', 'slickJS' )
    function slickJS() {
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/lib/slick/slick.min.js' , array('jquery') , true );
    wp_enqueue_script( 'slickjs', get_template_directory_uri() . '/js/slick.js' , array('jquery') , true );
    }
}

function my_acf_init() {
    if( function_exists('acf_add_options_page') ) {
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Tema inställningar', 'my_text_domain'),
            'menu_title'    => __('Tema inställningar', 'my_text_domain'),
            'menu_slug'     => 'theme-general-settings',
        )); 
    }
}

