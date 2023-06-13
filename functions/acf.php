<?php

/* REGISTER ACF BLOCKS */
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register line drawing block
		acf_register_block(array(
			'name'				=> 'line-drawing',
			'title'				=> __('Line Drawing'),
			'description'		=> __('Displays line drawing'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'format-image',
			'keywords'			=> array( 'image', 'drawing', 'line drawing' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

		// register traditional names block
		acf_register_block(array(
			'name'				=> 'traditional-names',
			'title'				=> __('Traditional Names'),
			'description'		=> __('Displays line drawing'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'format-image',
			'keywords'			=> array( 'image', 'drawing', 'line drawing' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

		// register carousel block
		acf_register_block(array(
			'name'				=> 'carousel',
			'title'				=> __('Carousel'),
			'description'		=> __('Displays gallery of images in carousel'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'format-image',
			'keywords'			=> array( 'images', 'gallery', 'carousel' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

		// register botanical names block
		acf_register_block(array(
			'name'				=> 'botanical-names',
			'title'				=> __('Botanical Names'),
			'description'		=> __('Displays list of botanical names for plant'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'nametag',
			'keywords'			=> array( 'name', 'plant name', 'botanical name' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

		// register notes block
		acf_register_block(array(
			'name'				=> 'notes',
			'title'				=> __('Notes'),
			'description'		=> __('Displays notes of post type'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'media-document',
			'keywords'			=> array( 'notes', 'content', 'information' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

		// register uses block
		acf_register_block(array(
			'name'				=> 'uses',
			'title'				=> __('Traditional Uses'),
			'description'		=> __('Displays traditional uses of post type'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'media-document',
			'keywords'			=> array( 'uses', 'traditional', 'information' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

	}
}

add_action('acf/init', 'my_acf_init');

function my_acf_block_render_callback( $block ) {
	
	$slug = str_replace('acf/', '', $block['name']);
	
	if( file_exists( get_theme_file_path("/templates/blocks/block-{$slug}.php") ) ) {
		include( get_theme_file_path("/templates/blocks/block-{$slug}.php") );
	}
}

// OPTIONS PAGE
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page( 'Theme Settings' );
	
}