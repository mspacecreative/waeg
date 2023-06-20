<?php

// CUSTOM STYLES ADDED TO FORMATS DROPDOWN
function my_custom_styles( $init_array ) {  

    $style_formats = array(  
        
        array(  
            'title' => 'Normal Text Style',  
            'inline' => 'span',  
            'classes' => 'font-style--normal',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Quote Author',  
            'inline' => 'span',  
            'classes' => 'author',
            'wrapper' => true,
        ),
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
    
    return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_custom_styles' );

// function custom_editor_styles() {
// 	add_editor_style('assets/css/editor-styles.css');
// }

// add_action('init', 'custom_editor_styles');