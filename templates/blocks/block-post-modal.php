<?php
$term = get_field('species_type');
$count = 1;
$args = array(
    'post_type' => 'plant',
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
                $line_drawing = get_field('drawing', get_the_ID());
                echo
                '<div id="bio-' . $count++ . '" class="post-modal-content">
                    <button class="closeModalButton">
                        <span style="background-color: #000;">&nbsp;</span>
                        <span style="background-color: #000;">&nbsp;</span>
                    </button>
                    <img src="' . $line_drawing['url'] . '" alt="' . $line_drawing['alt'] . '">
                </div>';
            }
            echo
            '</div>
        </div>
    </div>';
} wp_reset_query();