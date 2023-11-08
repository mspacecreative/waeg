<?php
if (have_rows('botanical_names', get_the_ID())) {
    echo
    '<div class="botanical-names bottom-margin-40">';
        $count = 0;    
        $names = get_field('botanical_names', get_the_ID());
        $count = count($names);
        if ($count > 1) {
            echo '<h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical names', 'waeg') . ':</strong>';
        } else {
            echo '<h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . ':</strong>';
        }
    while (have_rows('botanical_names', get_the_ID())) {
        the_row();

        if (have_rows('botanical_name', get_the_ID())) {
            $separator = ';';
            while (have_rows('botanical_name', get_the_ID())) {
                the_row();
                $name = get_sub_field('name');
                $designation = get_sub_field('designation') ? get_sub_field('designation') : '';
                $string = ' <span style="font-style: italic;">' . $name . '</span>' . esc_html(' ') . $designation;
                $array = explode(", ", $string);
                $stringify = implode("; ", $array);
                echo $stringify;
            }
        }
    }
            echo '</h2>
    </div>';
}