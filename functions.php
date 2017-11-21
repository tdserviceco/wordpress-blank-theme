<?php
$activate_slick = get_field('slick-bool', 'options');
add_action( 'wp_enqueue_scripts', 'markups' ); 

function markups() {
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js' , array('jquery') , true );
}

if ($activate_slick === 1) {
    add_action( 'wp_enqueue_scripts', 'slickJS' );
    function slickJS() {
        wp_enqueue_script( 'main', get_template_directory_uri() . '/js/lib/slick/slick.min.js' , array('jquery') , true );
        wp_enqueue_script( 'slickjs', get_template_directory_uri() . '/js/slick.js' , array('jquery') , true );
    }
}