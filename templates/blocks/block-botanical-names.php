<?php
if (have_rows('botanical_names', get_the_ID())) {
    echo
    '<div class="botanical-names bottom-margin-40">';
    while (have_rows('botanical_names', get_the_ID())) {
        the_row();

        if (have_rows('botanical_name', get_the_ID())) {
            $plural = 0;
            $names = get_field('botanical_name');
            if (is_array($names)) {
                $plural = count($names) > 1 ? 's' : '';
            }
            echo '<h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $plural . ':</strong>';
            
            while (have_rows('botanical_name', get_the_ID())) {
                the_row();
                $name = get_sub_field('name');
                $designation = get_sub_field('designation') ? get_sub_field('designation') : '';
                $plural = count(get_field('botanical_name')) > 1 ? 's' : '';
                if ( $name ) {
                    echo '<span style="font-style: italic;">' . $name . '</span>' . esc_html(' ') . $designation;
                }
            }

            echo
            '</h2>';
        }
    }
    echo 
    '</div>';
}