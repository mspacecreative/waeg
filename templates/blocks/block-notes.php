<?php
// CUSTOM CLASS	
$className = '';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

$notes = get_field('notes', get_the_ID());
$post = get_queried_object();
$postType = get_post_type_object(get_post_type($post));
if ( $notes ) {
    if ($postType) {
    echo 
    '
    <div class="top-margin-40 has-medium-font-size' . esc_attr($className) . '">
    <h2 class="has-large-font-size">' . esc_html_x('Plant Notes', 'waeg') . '</h2>';
    }
    echo
    '<div class="notes">' . $notes . '</div>
    </div>';
}