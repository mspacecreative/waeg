<?php
if (have_rows('botanical_names', get_the_ID($term_id))) {
    echo
    '<div class="botanical-names">';
        $names = get_field('botanical_names', get_the_ID($term_id));
        $check_plural = count($names) > 1 ? 's' : '';
        echo 
        '<h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $check_plural . ':</strong>';
    while (have_rows('botanical_names', get_the_ID($term_id))) {
        the_row();

        if (have_rows('botanical_name')) {
            while (have_rows('botanical_name')) {
                the_row();
                $array[] = get_sub_field('name');
                $designation[] = get_sub_field('designation');
                $combine = array_combine($array, $designation);
            }
        }
    }
        if ($combine) {
        foreach($combine as $k => $v) {
            $v_check = $v ? ' ' . $v : '';
            $data[] = " <i>$k</i>$v_check";
        }
            echo implode('; ', $data); }
        echo 
        '</h2>
    </div>';
} wp_reset_postdata();