<?php
$posttype = get_field('post_type');
$cols = get_field('columns');
switch($cols) {
    case '1':
        $cols = '1';
        break;
    case '2':
        $cols = '2';
        break;
    case '3':
        $cols = '3';
        break;
    default:
        $cols = '3';
        break;
}

// CUSTOM CLASS	
$className = '';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

$terms = get_terms( 'species' );

include 'includes/term-loop.php';