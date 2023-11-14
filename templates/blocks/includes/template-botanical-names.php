<?php
// if (have_rows('botanical_names', get_the_ID($term_id))) {
//     $names = get_field('botanical_names', get_the_ID($term_id));
//     $check_plural = count($names) > 1 ? 's' : '';

//     echo
//     '<div class="botanical-names">
//         <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';
//     while (have_rows('botanical_names', get_the_ID($term_id))) {
//         the_row();



//             if (have_rows('botanical_name')) {
//                 while (have_rows('botanical_name')) {
//                     the_row();
//                     $row = get_row();
//                     $names_array[] = $row['name'];
//                     $designation_array[] = $row['designation'];
//                     $combined_arrays = array_combine($names_array, $designation_array);
//                 }
//             }
//     }
//     if ($combined_arrays) {
//         foreach($combined_arrays as $k => $v) {
//             $v_check = $v ? ' ' . $v : '';
//         }
//     }
    
//     $data[] = " <i>$k</i>$v_check";
//     echo implode('; ', $data);

//         echo
//         '</h2>
//     </div>';
// }

if (have_rows('botanical_name', get_the_ID($term_id))) {
    while (have_rows('botanical_name', get_the_ID($term_id))) {
        the_row();
        $row = get_row();
        $names_array[] = $row['name'];
        $designation_array[] = $row['designation'];
        $combined_arrays = array_combine($names_array, $designation_array);
    }
    if ($combined_arrays) {
        foreach($combined_arrays as $k => $v) {
            $v_check = $v ? ' ' . $v : '';
        }
    }
    
    $data[] = " <i>$k</i>$v_check";
    echo implode('; ', $data);
}