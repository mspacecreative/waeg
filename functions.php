<?php

// OVERRIDE GUTENBERG
function gutenberg_editor_assets() {
  // Load the theme styles within Gutenberg.
  wp_enqueue_style('gutenberg', get_theme_file_uri('/assets/css/gutenberg.css'), FALSE);
}
add_action('enqueue_block_editor_assets', 'gutenberg_editor_assets');

// ADD BODY CLASS BASED ON PAGE TEMPLATE
function body_custom_class( $classes ) {
	if ( is_page_template( 'page.html' ) ) {
        $classes[] = 'page';
    }
	return $classes;
}
add_filter( 'body_class', 'body_custom_class' );

include 'functions/remove-post.php';
include 'functions/acf.php';
include 'functions/styles-scripts.php';
include 'functions/thumbnails.php';
include 'functions/tinymce.php';
// include 'functions/wpml.php';
include 'functions/audio-loop.php';
// include 'functions/language-switcher.php';
// include 'functions/analytics.php';