<?php
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
$terms = get_terms( $tax, $args = array(
  'hide_empty' => true,
));

echo
'<h2 class="wp-block-heading has-large-font-size">' . esc_html_x('Other Species', 'waeg') . '</h2>
<ul class="is-flex-container columns-' . $cols . ' wp-block-post-template wp-block-other-habitats">';

foreach( $terms as $term ) {

    $term_link = get_term_link( $term );

    if( $term->count > 0 ) {
        // echo '<a href="' . esc_url( $term_link ) . '">' . $term->name .'</a>';
       
        $featured_img = get_the_post_thumbnail($term_id, 'swiper-thumb');
        $permalink = get_the_permalink();

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