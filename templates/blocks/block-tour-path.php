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
    $line_drawing = get_field('drawing', $loop->ID);
    $url = $line_drawing['url'];
    $size = 'medium';
    $thumb = $line_drawing['sizes'][ $size ];
    $alt = $line_drawing['alt'];
    $title = get_the_title($loop->ID);
    $excerpt = get_the_excerpt($loop->ID);
    $permalink = get_the_permalink($loop->ID);
    
    echo 
    '<ul class="is-flex-container columns-2 wp-block-post-template wp-block-terms">';

    // if ($line_drawing) {
    echo
    '<div class="line-drawing-container">
        <img src="' . $url . '" alt="' . esc_attr($alt) . '">
    </div>';
    // }
    
    echo 
    '<div class="tour-path-content-container">
        <h2 class="wp-block-post-title has-medium-font-size">' . esc_html__($title) . '</h2>
    </div>';

    echo
    '<a href="' . esc_url($permalink) . '">' . get_term($term)->name . '</a>';

    echo
    '</ul>';
    
endwhile; ?>

<?php wp_reset_query();