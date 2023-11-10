<?php
$term = get_field('species_type');
$count = 1;
$loop = new WP_Query( array(
    'post_type' => 'plant',
    'orderby' => 'name',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'species',
            'field' => 'term_id',
            'terms' => $term
        )
    )
) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post();
    
    // VARIABLES
    $line_drawing = get_field('drawing', get_the_ID());
    $title = get_the_title($loop->ID);
    $excerpt = get_the_excerpt($loop->ID) ? '<p class="text__small">' . get_the_excerpt($loop->ID) . '</p>' : '';
    $permalink = get_the_permalink($loop->ID);
    $tour_url = get_field('tour_url', get_the_ID()) ? '<a class="button virtual-tour-link" href="' . esc_url(get_field('tour_url', get_the_ID())) . '">' . esc_html_x('View Berry', 'waeg') . '</a>' : '';

    echo 
    '<div class="is-layout-flex tour-path-wrapper">
        <div class="is-flex-container wp-block-post-template tour-path-content-container">';

        if ($line_drawing) {
        // DRAWING VARIABLES
        $url = $line_drawing['url'];
        $size = 'medium';
        $thumb = $line_drawing['sizes'][ $size ];
        $alt = $line_drawing['alt'];

        echo
        '<div class="line-drawing-container">
            <img src="' . esc_url($thumb) . '" alt="' . esc_attr($alt) . '">
        </div>';
        }
        
        echo 
        '<div class="tour-path-content">
            <h2 class="wp-block-post-title has-large-font-size" style="margin-block-start: 0;">' . esc_html__($title) . '</h2>'
            . $excerpt .
            '<div class="is-layout-flex post-modal-buttons">'
                . $tour_url .
                '<a class="button post-modal-link" data-id="bio-' . $count++ . '" href="' . esc_url($permalink) . '">' . esc_html_x('Berry Details', 'waeg') . '</a>
            </div>
        </div>';

        echo
        '</div>
    </div>';
    
endwhile; ?>

<?php wp_reset_query();