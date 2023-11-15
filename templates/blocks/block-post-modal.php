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
                $title = get_the_title($loop->ID);
                $line_drawing = get_field('drawing', get_the_ID($term_id));
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
                            if (have_rows('botanical_names', get_the_ID($term_id))) {

                                $name_count = count(get_field('botanical_names', get_the_ID($term_id)));
                                $check_plural = $name_count > 1 ? 's' : '';
                            
                                echo
                                '<div class="botanical-names">
                                    <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';
                                
                                while (have_rows('botanical_names', get_the_ID($term_id))) {
                                    the_row();
                            
                                        if (have_rows('botanical_name')) {
                                            while (have_rows('botanical_name')) {
                                                the_row();
                                                $name_array[] = get_sub_field('name');
                                                $designation_array[] = get_sub_field('designation');
                                                $combined_array = array_combine($name_array, $designation_array);
                            
                                                foreach($combined_array as $k => $v) {
                                                    $v_check = $v ? ' ' . $v : '';
                                                }
                                            }
                                        }
                                        $names_array[] = ' <i>' . $k . '</i>' . $v_check;
                                }
                                echo implode('; ', $names_array);
                            
                                echo
                                    '</h2>
                                </div>';
                            }
                            echo
                            '</div>
                        </div>
                        <div class="is-layout-flex">
                            <div class="line-drawing-container">
                                <img src="' . $line_drawing['url'] . '" alt="' . $line_drawing['alt'] . '">
                            </div>
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
            } wp_reset_postdata();
            echo
            '</div>
        </div>
    </div>';
}