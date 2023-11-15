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
                        $count = count($plant_names);
                        $name_array[] = get_sub_field('name');
                        $designation_array[] = get_sub_field('designation');
                        foreach ($plant_names as $k => $v) {
                            $k = get_sub_field('name');
                            $v = get_sub_field('designation');
                            // $name = get_sub_field('name') ? ' <i>' . get_sub_field('name') . '</i>' : '';
                            // $designation = ' ' . get_sub_field('designation') . '; ';
                            // $array = ' <i>' . implode(' ', $name_array) . '</i> ' . implode(" ", $designation_array);
                        }
                        $result = ' <i>' . $k . '</i>' . ' ' . $v . '; ';
                        echo $result;
                    }
                }
            }
            // $combine_arrays = array_combine($name_array, $designation_array);
            // foreach($combine_arrays as $k => $v) {
            //     $v_check = $v ? ' ' . $v : '';
            // }
            // $data[] = ' <i>' . $k . '</i>' . $v_check;
            // print_r($data);
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