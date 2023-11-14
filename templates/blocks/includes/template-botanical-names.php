<?php
if (have_rows('botanical_names', get_the_ID($term_id))) {

    $names = get_row_index(get_the_ID($term_id));
    $check_plural = $names > 1 ? 's' : '';

    echo
    '<div class="botanical-names">
        <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';
    
    while (have_rows('botanical_names', get_the_ID($term_id))) {
        the_row();

            if (have_rows('botanical_name', $loop->ID)) {
                while (have_rows('botanical_name', $loop->ID)) {
                    the_row();

                    if ( $plant_names = get_row() ) {
                        foreach ($plant_names as $name => $designation) {
                            $designation = get_sub_field('designation');
                            $name_array = explode(' ', get_sub_field('name', $name));
                            $designation_array = explode(' ', $designation);
                            $combine = array_combine($name_array, $designation_array);
                            // $names_array[] = get_sub_field('name', $key);
                            // $designations_array[] = get_sub_field('designation');
                        }
                        print_r($combine);
                        echo ' <i>' . implode('; ', $combine) . '</i>';
                    }
                    // $names_array[] = get_sub_field('name', $loop->ID);
                    // $designations_array[] = get_sub_field('designation', $loop->ID);
                    // $combine = array_combine($names_array, $designations_array);
                }
            }
    }

    echo
        '</h2>
    </div>';
}
// foreach($combine as $k => $v) {
//     $v_check = $v ? ' ' . $v : '';
//     $data[] = " <i>$k</i>$v_check";
// }
// echo
// '<div class="botanical-names">
//     <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';
//         echo implode('; ', $data) . 
//     '</h2>
// </div>';