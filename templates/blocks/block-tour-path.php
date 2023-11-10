<?php
$term = get_field('species_type');
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

    $count = 1;

    echo 
    '<div class="is-layout-flex tour-path-wrapper">
        <ul class="is-flex-container wp-block-post-template tour-path-content-container">';

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
            <h2 class="wp-block-post-title has-medium-font-size">' . esc_html__($title) . '</h2>'
            . $excerpt .
            '<a data-id="bio-' . $count++ . '" class="modal-link" href="' . esc_url($permalink) . '">' . esc_html_x('Berry Details', 'waeg') . '</a>
        </div>';

        echo
        '</ul>
    </div>';
    
endwhile; ?>

<?php wp_reset_query();