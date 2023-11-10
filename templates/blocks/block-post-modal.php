<?php
$term = get_field('species_type');
$count = 1;
$args = array(
    'post_type' => 'plant',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'species',
            'field' => 'slug',
            'terms' => 'berries'
        )
    )

);
$loop = new WP_Query($args);
$count = 0;
if ($loop->have_posts()) {
    echo
    '
    <div class="modal-backdrop"></div>
    <div class="modal">
        <div class="modal_table">
            <div class="modal_table_cell">';
            while ($loop->have_posts()) {
                $loop->the_post();
                $content = get_the_content(get_the_ID());
                echo
                '<div id="bio-' . $count++ . '" class="bio-container">
                    <button class="closeModalButton">
                        <span style="background-color: #000;">&nbsp;</span>
                        <span style="background-color: #000;">&nbsp;</span>
                    </button>'
                    . $content . 
                '</div>';
            }
            echo
            '</div>
        </div>
    </div>';
} wp_reset_query();