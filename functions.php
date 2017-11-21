<?php
add_action( 'wp_enqueue_scripts', 'markups' ); 

function markups() {
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js' , array('jquery') , true );
}