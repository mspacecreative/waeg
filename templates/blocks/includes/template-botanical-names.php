<?php
if (have_rows('botanical_names', get_the_ID($term_id))) {

    $names = get_row_index(get_the_ID($term_id));
    $check_plural = $names > 1 ? 's' : '';

    echo
    '<div class="botanical-names">
        <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';
    
    while (have_rows('botanical_names', get_the_ID($term_id))) {
        the_row();

            if (have_rows('botanical_name')) {
                while (have_rows('botanical_name')) {
                    the_row();

                    if ( $plant_names = get_row() ) {
                        $name_array[] = get_sub_field('name');
                        $designation_array[] = get_sub_field('designation');
                        $combine_arrays = array_combine($name_array, $designation_array);
                        // foreach ($plant_names as $name) {
                        //     $name = get_sub_field('name') ? get_sub_field('name') : '';
                        //     $designation = get_row_index() > 1 ? get_sub_field('designation') . '; ' : get_sub_field('designation');
                        //     // $array = ' <i>' . implode(' ', $name_array) . '</i> ' . implode(" ", $designation_array);
                        // }
                        // echo $name, $designation;
                    }
                    print_r($combine_arrays);
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