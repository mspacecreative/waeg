<?php
$name_count = count(get_field('botanical_names', get_the_ID($term_id)));
$check_plural = $name_count > 1 ? 's' : '';

echo
'<div class="botanical-names">
    <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';

while (have_rows('botanical_names', get_the_ID($term_id))) {
    the_row();

    $name_rows = get_row();

    foreach ($name_rows as $name_row) {

        while (have_rows('botanical_name')) {
            the_row();
            $name_array[] = get_sub_field('name');
            $designation_array[] = get_sub_field('designation');
            $combined_array = array_combine($name_array, $designation_array);

            foreach($combined_array as $k => $v)
                $v_check = $v ? ' ' . $v : '';
                
            $names_array[] = ' <i>' . $k . '</i>' . $v_check;
        }
    }
}  
        print_r($combined_array);
        // echo implode('; ', $names_array);

echo
    '</h2>
</div>';

