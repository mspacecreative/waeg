<?php
function waeg_styles() {

    $rand_num = rand();
        wp_register_style( 'main', get_template_directory_uri() . '/assets/css/styles.css?ver=' . $rand_num, array(), null );
	    wp_enqueue_style( 'main' );
    $virtual_tour_page_id = 1677;
    if ( is_singular(array('plant', 'habitat')) || is_page('virtual-tour') || $post->post_parent == $virtual_tour_page_id ) {
        // SWIPER CSS
        wp_register_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css', array(), null );
        wp_enqueue_style( 'swiper' );

        // SWIPER JS
        wp_register_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array(), null, true );
        wp_enqueue_script( 'swiper' );

        // SWIPER INIT JS
        wp_register_script( 'swiper-init', get_template_directory_uri() . '/assets/js/swiper.js', array(), null, true );
        wp_enqueue_script( 'swiper-init' );

        // LIGHTBOX JS
        wp_register_script( 'lightbox', get_template_directory_uri() . '/assets/js/lightbox.js', array(), null, true );
        wp_enqueue_script( 'lightbox' );
    }

    // FONTAWESOME
    // wp_register_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.css?ver=' . $rand_num, array(), null );
    // wp_enqueue_style( 'fontawesome' );
    wp_register_script( 'fontawesome', 'https://kit.fontawesome.com/7cf12db9b6.js?ver=' . $rand_num, array(), null, true );
	wp_enqueue_script( 'fontawesome' );

    wp_register_script( 'main', get_template_directory_uri() . '/assets/js/main.js?ver=' . $rand_num, array(), null, true );
	wp_enqueue_script( 'main' );

}
add_action( 'wp_enqueue_scripts', 'waeg_styles' );