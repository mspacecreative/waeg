<?php
function load_admin_style() {
    wp_register_style( 'admin_css', get_template_directory_uri() . '/assets/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'admin_css');
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );