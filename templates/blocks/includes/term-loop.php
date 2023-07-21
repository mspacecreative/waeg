<?php
echo
'<ul class="is-flex-container columns-' . $cols . ' wp-block-post-template-container wp-block-post-template' . esc_attr($className) . '">';

foreach( $terms as $term ) {

    $term_link = get_term_link( $term );
    $shrubs_img = get_field('shrubs_img', $term);
    $size = 'swiper-thumb';
    $featured_img = wp_get_attachment_image( $shrubs_img, $size );

    if( $term->count > 0 ) {

        echo
        '<li class="wp-block-post">
            <figure class="wp-block-post-featured-image">
                <a href="' . esc_url( $term_link ) . '">'
                    . $featured_img . 
                '</a>
            </figure>
            <h3 class="wp-block-post-title has-large-font-size">' . $term->name . '</h3>
        </li>';
    }
}
echo
'<ul>';