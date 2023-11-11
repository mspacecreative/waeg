<?php
if (have_rows('botanical_names', get_the_ID($term_id))) {
    echo
    '<div class="botanical-names">';
    while (have_rows('botanical_names', get_the_ID($term_id))) {
        the_row();

        $names = get_field('botanical_names', get_the_ID($term_id));
        $check_plural = count($names) > 1 ? 's' : '';
        
        echo 
        '<h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';

        if (have_rows('botanical_name')) {
            while (have_rows('botanical_name')) {
                the_row();
                $names_array[] = get_sub_field('name');
                $designation_array[] = get_sub_field('designation');
                $combined_arrays = array_combine($names_array, $designation_array);

                if ($combined_arrays) {
                    foreach($combined_arrays as $k => $v) {
                        $v_check = $v ? ' ' . $v : '';
                    }
                }
                $data[] = " <i>$k</i>$v_check";
                $result = implode('; ', $data);
            }
        }
            echo $result .
        '</h2>';
    }
    echo
    '</div>';
}