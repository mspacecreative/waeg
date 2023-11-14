<?php
if (have_rows('botanical_names', get_the_ID($term_id))) {
    
    while (have_rows('botanical_names', get_the_ID($term_id))) {
        the_row();

        $names = get_row_index();
        $check_plural = $names > 1 ? 's' : '';

        echo
        '<div class="botanical-names">
            <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';
            
            if (have_rows('botanical_name', $loop->ID)) {
                while (have_rows('botanical_name', $loop->ID)) {
                    the_row();

                    if ( $plant_names = get_row() ) {
                        foreach ($plant_names as $key => $value) {
                            $value = get_sub_field('designation');
                            if (!empty($value) ) { 
                                $field = get_sub_field('name', $key);
                            }
                        }
                        echo ' <i>' . $field . '</i> ' . $value . '; ';
                    }
                    // $names_array[] = get_sub_field('name', $loop->ID);
                    // $designations_array[] = get_sub_field('designation', $loop->ID);
                    // $combine = array_combine($names_array, $designations_array);
                }
            }

            echo
            '</h2>
        </div>';
    }
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