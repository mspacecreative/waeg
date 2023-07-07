<?php
$cols = get_field('columns');
$pages = get_field('pages');
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

if ($pages) {

    echo
    '<ul class="is-flex-container columns-' . $cols . ' wp-block-post-template-container wp-block-post-template wp-block-other-habitats' . esc_attr($className) . '">';

    foreach( $pages as $page ) {

        setup_postdata($page);
        $title = get_the_title($page->ID);
        $permalink = get_the_permalink($page->ID);
        $featured_img = get_the_post_thumbnail( $page->ID, 'swiper-thumb' );

        echo
        '<li class="wp-block-post">
            <figure class="wp-block-post-featured-image">
                <a href="' . esc_url( $permalink ) . '">'
                    . $featured_img . 
                '</a>
            </figure>
            <h3 class="wp-block-post-title has-large-font-size">' . $title . '</h3>
        </li>';
    }

    echo
    '<ul>';
}