<?php
$name_count = count(get_field('botanical_names', get_the_ID($term_id)));
$check_plural = $name_count > 1 ? 's' : '';

echo
'<div class="botanical-names">
    <h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';

while (have_rows('botanical_names', get_the_ID())) {
    the_row();

    $name_rows = get_row(get_the_ID($query->ID));
}
foreach ($name_rows as $name_row) {
    $names = $name_row['name'];
    $designations = $name_row['designation'];
    $name_array[] = $names;
    $designation_array[] = $designations;
    $combined_array = array_combine($name_array, $designation_array);

    foreach($combined_array as $k => $v)
        $v_check = $v ? ' ' . $v : '';
}
$names_array[] = ' <i>' . $k . '</i>' . $v_check;
        echo implode('; ', $names_array);
        // print_r($names_array);

echo
    '</h2>
</div>';
