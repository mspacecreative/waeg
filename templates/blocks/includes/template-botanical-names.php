<?php
if (have_rows('botanical_names', get_the_ID())) {
    echo
    '<div class="botanical-names bottom-margin-40">';
        $names = get_field('botanical_names', get_the_ID());
        $check_plural = count($names) > 1 ? 's' : '';
        echo 
        '<h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';

    while (have_rows('botanical_names', get_the_ID($term_id))) {
        the_row();

        while (have_rows('botanical_name', get_the_ID($term_id))) {
            the_row();
            $names = get_sub_field('name', get_the_ID($term_id));
            $names_array = [];
            $names_array = explode(", ", $names);
            $designations = get_sub_field('designation', get_the_ID($term_id));
            $designations_array = [];
            $designations_array = explode(", ", $designations);
        }
        $combined_array = array_combine($names_array, $designations_array);
    }
            if ($combined_array) {
                $data = array();
                foreach($combined_array as $k => $v) {
                    $v_check = $v ? ' ' . $v : '';
                    $data[] = " <i>$k</i>$v_check";
                }
            }
            echo implode('; ', $data);

    echo
        '</h2>
    </div>';
}

