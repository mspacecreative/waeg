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

if ($pages) {

    echo
    '<ul>';

    foreach( $pages as $page ) {

        setup_postdata($page);
        $title = get_the_title();
        $permalink = get_the_permalink();
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