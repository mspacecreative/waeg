<?php
if (have_rows('botanical_names', get_the_ID())) {
    while (have_rows('botanical_names', get_the_ID())) {
        the_row();
        $botanical_names = get_sub_field('botanical_name');
        $designation = get_sub_field('designation') ? get_sub_field('designation') : '';
        if ( $botanical_names ) {
            echo
            '<div class="botanical-names bottom-margin-40">
                <h2 class="has-medium-font-size"><strong>Botanical name(s):</strong> ' . '<span style="font-style: italic;">' . $botanical_names . '</span>' . esc_html(' ') . $designation . '</h2>
            </div>';
        }
    }
}