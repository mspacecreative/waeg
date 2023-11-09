<?php
if (have_rows('botanical_names', get_the_ID())) {
    echo
    '<div class="botanical-names bottom-margin-40">';
        $count = 0;    
        $names = get_field('botanical_names', get_the_ID());
        $count = count($names) > 1 ? 's' : '';
        if (count($names) > 0) {
            echo '<h2 class="has-medium-font-size"><strong>' . esc_html_x('Botanical name', 'waeg') . $count . ':</strong>';
        }
    while (have_rows('botanical_names', get_the_ID())) {
        the_row();

        if (have_rows('botanical_name', get_the_ID())) {
            $separator = ';';
            while (have_rows('botanical_name', get_the_ID())) {
                the_row();
                $array[] = get_sub_field('name');
                $designation[] = get_sub_field('designation');
                $combine = array_combine($array, $designation);
            }
        }
    }
    if ($combine) {
    foreach($combine as $k => $v) {
        $data[] = " <i>$k</i> $v";
    }
                echo implode('; ', $data); }
            echo '</h2>
    </div>';
}