<?php
$args = array(
    'post_type' => 'habitat',
    'post__not_in' => array(get_the_ID()),
);

$loop = new WP_Query($args);

if ($loop->have_posts()) {
    echo
    '<ul class="wp-block-post-template">';
    while ($loop->have_posts()) {
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
    }
    echo
    '<ul>';
}