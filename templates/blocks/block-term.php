<?php
$loop = new WP_Query( array(
    'post_type' => 'plant',
    'tax_query' => array(
        array(
            'taxonomy' => 'species',
            'field' => 'term_id',
            'terms' => get_queried_object()->term_id
        )
    )
) ); ?>
<ul class="is-flex-container columns-3 wp-block-post-template">
<?php while ( $loop->have_posts() ) : $loop->the_post();
    $loop->the_post();
    $featured_img = get_the_post_thumbnail(get_the_ID(), 'swiper-thumb');
    $title = get_the_title();
    $permalink = get_the_permalink();

    echo
    '<li class="wp-block-post">
        <figure class="wp-block-post-featured-image">
            <a href="' . $permalink . '">'
                . $featured_img . 
            '</a>
        </figure>
        <h3 class="wp-block-post-title has-large-font-size">' . esc_html__($title) . '</h3>
    </li>';
endwhile; ?>
</ul>

<?php wp_reset_query();