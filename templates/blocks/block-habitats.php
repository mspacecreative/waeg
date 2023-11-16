<?php
$posttype = get_field('post_type');
$cols = get_field('columns');
$label = $posttype['label'];
$value = $posttype['value'];
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
if ($posttype['value'] == 'habitat') {
    $args = array(
        'post_type' => $value,
        'post__not_in' => array(get_the_ID()),
    );
} elseif ($posttype['value'] == 'plant') {
    $custom_terms = wp_get_post_terms(get_the_ID(), 'species');
    if( $custom_terms ){

        $tax_query = array();
    
        foreach( $custom_terms as $custom_term ) {
    
            $tax_query[] = array(
                'taxonomy' => 'species',
                'field' => 'slug',
                'terms' => $custom_term->slug,
            );
    
        }
    
        $args = array( 
            'post_type' => 'plant',
            'posts_per_page' => -1,
            'post__not_in' => array(get_the_ID()),
            'orderby' => 'name',
            'order' => 'ASC',
            'tax_query' => $tax_query 
        );
    }
} elseif ($posttype['value'] == 'species') {
    $args = array(
        'post_type' => 'plant',
        'post__not_in' => array(get_the_ID()),
        'tax_query' => array(
            array(
                'taxonomy' => $value,
                'field' => 'term_id',
                'terms' => array(get_queried_object()->term_id)
            )
        )
    );
}

$loop = new WP_Query($args);

if ($loop->have_posts()) {
    $label = $posttype['value'] == 'habitat' || $posttype['value'] == 'species' ? $posttype['label'] : $custom_term->name;
    $cardclass = $posttype['value'] == 'habitat' || $posttype['value'] == 'species' ? ' wp-block-other-habitats' : ' wp-block-other-term-posts flex-nowrap';
    echo
    '<h2 class="wp-block-heading has-large-font-size">' . esc_html_x('Other ', 'waeg');
        if ($custom_term->slug == 'des-arbres') {
            echo ltrim(strtolower($label), 'des ');
        } elseif ($custom_term->slug == 'other-important-plants-and-species') {
            echo ltrim(strtolower($label), 'other ');
        } else {
            echo strtolower($label);
        }
    echo
    '</h2>
    <ul class="is-flex-container columns-' . $cols . ' wp-block-post-template-container wp-block-post-template' . $cardclass . '">';
    while ($loop->have_posts()) {
        $loop->the_post();
        $featured_img = get_the_post_thumbnail(get_the_ID(), 'swiper-thumb');
        $title = get_the_title();
        $permalink = get_the_permalink();

        echo
        '<li class="wp-block-post">
            <figure class="wp-block-post-featured-image">
                <a href="' . $permalink . '">'
                    . $featured_img . 
                '</a>
            </figure>
            <h3 class="wp-block-post-title has-large-font-size">' . esc_html__($title) . '</h3>
        </li>';
    }
    echo
    '</ul>';
}
