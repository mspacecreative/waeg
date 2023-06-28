<?php
/**
 * Title: Species
 * Slug: waeg/berry
 * Categories: main
 * Block Types: core/template-part/berry
 */

$args = array(
    'post_type' => 'plant',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'species',
            'field' => 'slug',
            'terms' => 'berry',
        )
    )
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    echo
    '<ul>';
    while ($query->have_posts()) {
        $query->the_post();
        echo
        '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
    }
    echo
    '</ul>';
    wp_reset_query();
}
