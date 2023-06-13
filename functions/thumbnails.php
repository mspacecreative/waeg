<?php
function custom_thumbnails() {
	add_image_size( 'swiper-thumb', 800, 450, array('center', 'center') );
}
add_action( 'after_setup_theme', 'custom_thumbnails' );