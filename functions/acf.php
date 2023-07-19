<?php

/* REGISTER ACF BLOCKS */

// REGISTER JSON BLOCKS
function load_json_blocks() {
	register_block_type( get_theme_file_path('/templates/blocks/quote/block.json') );
}
add_action( 'acf/init', 'load_json_blocks' );

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

		// register habitat intro block
		acf_register_block(array(
			'name'				=> 'habitat-intro',
			'title'				=> __('Habitat Intro'),
			'description'		=> __('Displays intro blurb for habitat post type'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'media-document',
			'keywords'			=> array( 'blurb', 'content', 'text' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

		// register features block
		acf_register_block(array(
			'name'				=> 'features',
			'title'				=> __('Features'),
			'description'		=> __('Displays features in unordered list on frontend'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'editor-ul',
			'keywords'			=> array( 'feature', 'list', 'icon' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

		// register habitats block
		acf_register_block(array(
			'name'				=> 'habitats',
			'title'				=> __('Other Habitats'),
			'description'		=> __('Displays all other habitats'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'editor-ul',
			'keywords'			=> array( 'feature', 'list', 'icon' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

		// register sitemap block
		acf_register_block(array(
			'name'				=> 'sitemap',
			'title'				=> __('Species Sitemap'),
			'description'		=> __('Displays species sitemap'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'tag',
			'keywords'			=> array( 'sitemap', 'navigation', 'species' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

		// register term block
		acf_register_block(array(
			'name'				=> 'term',
			'title'				=> __('Term Block'),
			'description'		=> __('Displays all posts related to term'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'tag',
			'keywords'			=> array( 'term', 'species', 'list' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

		// register loop block
		acf_register_block(array(
			'name'				=> 'loop',
			'title'				=> __('Loop Block'),
			'description'		=> __('Displays all posts related to a chosen post type'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'grid-view',
			'keywords'			=> array( 'post type', 'loop', 'list' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

		// register term block
		acf_register_block(array(
			'name'				=> 'other-species',
			'title'				=> __('Other Species Block'),
			'description'		=> __('Displays all other species not related to current post'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'tag',
			'keywords'			=> array( 'term', 'species', 'list' ),
			'supports'			=> [
				'align' => false,
				'anchor' => true,
				'customClassName' => true,
                'mode' => true,
			]
		));

		// register term block
		acf_register_block(array(
			'name'				=> 'card',
			'title'				=> __('Card Block'),
			'description'		=> __('Displays featured image and linkable post title overlay'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'format-image',
			'keywords'			=> array( 'page', 'page link', 'card' ),
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