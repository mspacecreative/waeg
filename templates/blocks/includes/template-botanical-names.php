<?php
if (have_rows('botanical_names', get_the_ID($term_id))) {

    $name_count = count(get_field('botanical_names', get_the_ID($term_id)));
    $check_plural = $name_count > 1 ? 's' : '';

    echo
    '<div class="botanical-names">
        <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';
    
    while (have_rows('botanical_names', get_the_ID($term_id))) {
        the_row();

            if (have_rows('botanical_name')) {
                while (have_rows('botanical_name')) {
                    the_row();
                    $row_count = get_row_index();
                    $name_array[] = get_sub_field('name');
                    $designation_array[] = get_sub_field('designation');
                    $combine = array_combine($name_array, $designation_array);
                }
            }
    }
    if ($combine) {
        foreach($combine as $k => $v) {
            $v_check = $v ? ' ' . $v : '';
            $names_string[] = " <i>$k</i>$v_check";
        }
        echo implode('; ', $names_string);
    }

    echo
        '</h2>
    </div>';
}

// echo
// '<div class="botanical-names">
//     <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';
//         echo implode('; ', $names_string);
//     echo
//     '</h2>
// </div>';

