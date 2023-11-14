<?php
if (have_rows('botanical_names', get_the_ID($term_id))) {
    
    while (have_rows('botanical_names', get_the_ID($term_id))) {
        the_row();

        $names = get_row_index();
        $check_plural = $names > 1 ? 's' : '';
            
        if (have_rows('botanical_name')) {
            while (have_rows('botanical_name')) {
                the_row();
                $names_array[] = get_sub_field('name');
                $designations_array[] = get_sub_field('designation');
                $combine = array_combine($names_array, $designations_array);
            }
        }
    }
}
foreach($combine as $k => $v) {
    $v_check = $v ? ' ' . $v : '';
}
$data[] = " <i>$k</i>$v_check";
echo
'<div class="botanical-names">
    <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';
        echo implode('; ', $data) . 
    '</h2>
</div>';