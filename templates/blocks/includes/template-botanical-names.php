<?php
$name_count = count(get_field('botanical_names', get_the_ID($term_id)));
$check_plural = $name_count > 1 ? 's' : '';

echo
'<div class="botanical-names">
    <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';

while (have_rows('botanical_names', get_the_ID($term_id))) {
    the_row();

    while (have_rows('botanical_name', get_the_ID($term_id))) {
        the_row(get_the_ID($term_id));

        $row = get_row(get_the_ID());
        $names = $row['name'];
        // $name = explode(',' $row);
        // foreach ($row as $single_row)
        //     $name_array = get_sub_field('name', get_the_ID($single_row));
        // $designation_array[] = get_sub_field('designation');
        // $combined_array = array_combine($name_array, $designation_array);

        // foreach($combined_array as $k => $v)
        //     $v_check = $v ? ' ' . $v : '';
            
        // $names_array[] = ' <i>' . $k . '</i>' . $v_check;
        print($names);
    }
}  
        // echo implode('; ', $names_array);
        // print_r($name_count);

echo
    '</h2>
</div>';

