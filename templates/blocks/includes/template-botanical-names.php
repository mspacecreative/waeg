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

                    // print_r($names);

                    if ( $plant_names = get_row() ) {
                        foreach ($plant_names as $plant_name) {
                            $name = get_sub_field('name', $plant_name) ? ' <i>' . get_sub_field('name', $plant_name) . '</i>' : '';
                            $designation = ' ' . get_sub_field('designation', $plant_name);
                            $designation = $name_count > 1 ? $designation . '; ' : $designation;
                            $result = $name;
                            $result .= $designation;
                            $result = $name_count > 1 ? substr_replace($result, "", -2) : $result;
                        }
                        echo $result;
                    }
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