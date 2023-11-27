<?php
$term = get_field('species_type');
$target_counter = 1;
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
    $plant_notes = get_field('notes', get_the_ID());
    $excerpt = !empty(get_the_excerpt($loop->ID)) ? '<p class="text__small">' . get_the_excerpt($loop->ID) . '</p>' : $plant_notes;
    $permalink = get_the_permalink($loop->ID);
    $term_id = get_term($term, 'species');
    $term_slug = $term_id->slug;

    switch($term_slug) {
        case 'berries':
            $button_label = 'Berry';
            break;
        case 'baies':
            $button_label = 'Baie';
            break;
        case 'flowers-and-herbs':
            $button_label = 'Plant';
            break;
        case 'other-important-plants':
            $button_label = 'Plant';
            break;
        case 'shrubs':
            $button_label = 'Shrub';
            break;
        case 'trees':
            $button_label = 'Tree';
            break;
        default:
            $button_label = '';
    }

    $tour_url = get_field('tour_url', get_the_ID()) ? '<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button virtual-tour-link" href="' . esc_url(get_field('tour_url', get_the_ID())) . '">' . esc_html_x('View ', 'waeg') . esc_html_x($button_label, 'waeg') . '</a></div>' : '';

    echo 
    '<div id="' . sanitize_title($title) . '" class="is-layout-flex tour-path-wrapper">
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
            '<div class="is-layout-flex wp-block-buttons">' 
                . $tour_url . 
                '<div class="wp-block-button is-style-outline">
                    <button type="button" class="wp-block-button__link wp-element-button" data-bs-toggle="modal" data-bs-target="#post-modal-' . $target_counter++ . '">' . esc_html_x('More Details', 'waeg') . '</button>
                </div>
            </div>
        </div>';

        echo
        '</div>
    </div>';
    
endwhile; ?>