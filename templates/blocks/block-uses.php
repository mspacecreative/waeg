<?php
// CUSTOM CLASS	
$className = '';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

$uses = get_field('traditional_uses', get_the_ID());
if ( $uses ) {
    echo 
    '<div class="top-margin-40 has-medium-font-size' . esc_attr($className) . '">
        <h2 class="has-large-font-size">' . esc_html__('Traditional Uses', 'waeg') . '</h2>';
    echo
        '<div class="notes">' . $uses . '</div>
    </div>';
}