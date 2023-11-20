<?php
$name_count = count(get_field('botanical_names', get_the_ID($term_id)));
$check_plural = $name_count > 1 ? 's' : '';

echo
'<div class="botanical-names">
    <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';

while (have_rows('botanical_names', get_the_ID($term_id))) {
    the_row();

    while (have_rows('botanical_name')) {
        the_row();
        $names_array = [];
        $designations_array = [];
        $names_array[] = get_sub_field('name');
        $designations_array[] = get_sub_field('designation');
    }
    
    $combined_array = array_combine($names_array, $designations_array);
    // $data = [];

    // foreach($combined_array as $k => $v)
    //     $v_check = $v ? ' ' . $v : '';

    // $data = " <i>$k</i>$v_check";
    $combined_array = array_combine($combined_array);
    
    print_r($combined_array);
}

echo
    '</h2>
</div>';

