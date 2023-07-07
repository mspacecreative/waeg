<?php
$berries_img = get_field('berries', 'option');
$flowers_img = get_field('flowers', 'option');
$tax = 'species';
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

$terms = get_terms( $tax, array(
    'exclude' => array(get_queried_object()->term_id)
));

echo
'<h2 class="wp-block-heading has-large-font-size">' . esc_html_x('Other Species', 'waeg') . '</h2>
<ul class="is-flex-container columns-' . $cols . ' wp-block-post-template-container wp-block-post-template wp-block-other-habitats">' . wp_get_attachment_image( $shrubs_img, $size );

foreach( $terms as $term ) {

    $term_link = get_term_link( $term );

    if( $term->count > 0 ) {
        
        $term = get_queried_object();
        $size = 'swiper-thumb';
        $featured_img = get_field('shrubs_img', $term) ? wp_get_attachment_image( get_field('shrubs_img', $term), $size ) : '';
        // $permalink = get_the_permalink();

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
?>