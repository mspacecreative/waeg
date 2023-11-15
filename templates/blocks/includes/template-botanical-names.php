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
                        $many_names = $names > 1 ? '; ' : '';
                        foreach ($plant_names as $plant_name) {
                            $name = get_sub_field('name', $plant_name) ? ' <i>' . get_sub_field('name', $plant_name) . '</i>' : '';
                            $designation = ' ' . get_sub_field('designation', $plant_name) . $many_names;
                        }
                    }
                    // print_r($count);
                    echo $name, $designation;
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