<?php
if (have_rows('botanical_names', get_the_ID())) {
    echo
    '<div class="botanical-names bottom-margin-40">';
        $count = 0;    
        $names = get_field('botanical_names', get_the_ID());
        $count = count($names) > 1 ? 's' : '';
        echo '<h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $count . ':</strong>';
    while (have_rows('botanical_names', get_the_ID())) {
        the_row();

        if (have_rows('botanical_name', get_the_ID())) {
            $separator = ';';
            while (have_rows('botanical_name', get_the_ID())) {
                the_row();
                $array[] = get_sub_field('name');
                $designation[] = get_sub_field('designation');
                // $string = ' <span style="font-style: italic;">' . $name . '</span>' . esc_html(' ') . $designation . $separator;
                $names_array = explode(" ", $name);
                // $designation_array = explode(", ", $designation);
                // $array = array_merge($names_array, $designation_array);
                $combine = array_combine($array, $designation);
            }
        }
    }
    foreach($combine as $k => $v) {
        $data[] = " <i>$k</i> $v";
    }
                echo implode('; ', $data);
            echo '</h2>
    </div>';
}