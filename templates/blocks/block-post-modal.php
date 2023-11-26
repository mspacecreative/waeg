<?php
$term = get_field('species_type');
$modal_counter = 1;
$aria_counter = 1;
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
            'terms' => $term
        )
    )

);

$query = new WP_Query($args);

if ($query->have_posts()) {
    echo
    '<div class="post-modal-posts-container">';
    while ($query->have_posts()) {
    $query->the_post();
    $term_id = get_queried_object_id();
    $title = get_the_title($query->ID);
    $line_drawing = !empty(get_field('drawing', get_the_ID($term_id))) ? '<img src="' . get_field('drawing', get_the_ID($term_id))['url'] . '" alt="' . get_field('drawing', get_the_ID($term_id))['alt'] . '">' : '';
    echo
    '<div id="post-modal-' . $modal_counter++ . '" class="modal" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="post-title-' . $aria_counter++ . '" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="wp-block-columns is-layout-flex are-vertically-aligned-center page-title" style="align-items: center!important;margin-block-start: 1em;">
                    <div class="wp-block-column">
                        <div class="modal-header">
                            <h1 id="post-title-' . $id_counter++ . '" class="modal-title has-large-font-size" style="margin: 0;">' . $title . '</h1>
                        </div>
                    </div>
                    <div class="wp-block-column is-layout-flex is-content-justification-right">';
                        include 'includes/template-botanical-names.php';
                    echo
                    '</div>
                </div>
                <div class="is-layout-flex">
                    <div class="line-drawing-container">'
                        . $line_drawing .
                    '</div>
                    <div class="post-content">';
                        include 'includes/template-traditional-names.php';
                        include 'includes/template-carousel.php';
                        include 'includes/template-notes.php';
                        include 'includes/template-traditional-uses.php';
                        include 'includes/template-people-and-plants.php';
                    echo
                    '</div>
                </div>
            </div>
        </div>
    </div>';
    }
    echo
    '</div>';
} wp_reset_postdata();