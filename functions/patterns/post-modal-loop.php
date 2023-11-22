<?php
$id_counter = 1;
$args = array(
    'post_type' => 'plant',
    'posts_per_page' => -1,
    'orderby' => 'name',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'species',
            'field' => 'term_id',
            'terms' => 'berries'
        )
    )

);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
    $query->the_post();
    $title = get_the_title($query->ID);
    echo
    '<h1 id="post-title-' . $id_counter++ . '" class="modal-title has-large-font-size" style="margin: 0;">' . $title . '</h1>';
    }
} wp_reset_postdata();