<?php
$name_count = count(get_field('botanical_names', get_the_ID($term_id)));
$check_plural = $name_count > 1 ? 's' : '';

echo
'<div class="botanical-names">
    <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';

while (have_rows('botanical_names', get_the_ID($term_id))) {
    the_row();

    while (have_rows('botanical_name', get_the_ID($term_id))) {
        the_row();
        // $row = get_row(get_the_ID());
        $names = get_sub_field('name', get_the_ID($term_id));
        $designations = get_sub_field('designation', get_the_ID($term_id));
        $names_array = [];
        $names_array = explode(", ", $names);
        $designations_array = [];
        $designations_array = explode(", ", $designations);
        $combined_array = array_combine($names_array, $designations_array);

        foreach($combined_array as $k => $v)
            $v_check = $v ? ' ' . $v : '';
    }
    $names_array = [];   
    $names_array = ' <i>' . $k . '</i>' . $v_check;
    $names_array = array_merge($names_array);
    echo implode("; ", $names_array);
}

echo
    '</h2>
</div>';

