<?php
$term = get_field('species_type');
$count = 1;
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

$loop = new WP_Query($args);

if ($loop->have_posts()) {
    echo
    '<div class="modal-backdrop"></div>
    <div class="modal">
        <div class="modal_table">
            <div class="modal_table_cell">';
            while ($loop->have_posts()) {
                $loop->the_post();
                $term_id = get_queried_object_id();
                $line_drawing = get_field('drawing', get_the_ID($term_id));
                echo
                '<div id="bio-' . $count++ . '" class="post-modal-content">
                    <button class="closeModalButton">
                        <span style="background-color: #000;">&nbsp;</span>
                        <span style="background-color: #000;">&nbsp;</span>
                    </button>
                    <div class="is-layout-flex post-modal-content-wrapper">
                        <img src="' . $line_drawing['url'] . '" alt="' . $line_drawing['alt'] . '">';
                        include 'includes/template-traditional-names.php';
                        include 'includes/template-carousel.php';
                        include 'includes/template-notes.php';
                    echo
                    '</div>
                </div>';
            }
            echo
            '</div>
        </div>
    </div>';
} wp_reset_query();