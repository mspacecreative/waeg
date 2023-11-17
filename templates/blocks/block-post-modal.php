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

$query = new WP_Query($args);

if (count($query->posts)) {
    echo
    '<div class="modal-backdrop"></div>
    <div class="modal">
        <div class="modal_table">
            <div class="modal_table_cell">';
            foreach ($query->posts as $nested_post) {
                // $query->the_post();
                $term_id = get_queried_object_id();
                $title = get_the_title($nested_post->ID);
                $line_drawing = !empty(get_field('drawing', get_the_ID($term_id))) ? '<img src="' . get_field('drawing', get_the_ID($term_id))['url'] . '" alt="' . get_field('drawing', get_the_ID($term_id))['alt'] . '">' : '';
                echo
                '<div id="bio-' . $count++ . '" class="post-modal-content">
                    <button class="closeModalButton">
                        <span style="background-color: #000;">&nbsp;</span>
                        <span style="background-color: #000;">&nbsp;</span>
                    </button>
                    <div class="post-modal-content-wrapper">
                        <div class="wp-block-columns is-layout-flex are-vertically-aligned-center page-title">
                            <div class="wp-block-column">
                                <h1 class="has-large-font-size" style="margin: 0;">' . $title . '</h1>
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
                            echo
                            '</div>
                        </div>
                    </div>
                </div>';
            }
            echo
            '</div>
        </div>
    </div>';
} wp_reset_postdata();