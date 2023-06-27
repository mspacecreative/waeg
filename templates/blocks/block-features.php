<?php
if (have_rows('features', get_the_ID())) {
    echo
    '<ul class="features">';
    while (have_rows('features', get_the_ID())) {
        the_row();
        $feature_content = get_sub_field('feature_content');
        $feature_icon = get_sub_field('feature_icon');
        echo
        '<li class="feature">
            <img class="full-width feature__icon" src="' . esc_url($feature_icon['url']) . '" alt="' . esc_attr($feature_icon['alt']) . '" />
            <p class="feature__content">' . $feature_content . '</p>
        </li>';
    }
    echo
    '</ul>';
}