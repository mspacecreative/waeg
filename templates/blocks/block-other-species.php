<?php
$tax = 'species';
$cols = get_field('columns');
$heading = get_field('heading');

// CUSTOM CLASS	
$className = '';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

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

$terms = get_terms( $tax, array(
    'exclude' => array(get_queried_object()->term_id)
));

if ($heading) {
echo
'<h2 class="wp-block-heading has-large-font-size">' . $heading . '</h2>';
}

include 'includes/term-loop.php';