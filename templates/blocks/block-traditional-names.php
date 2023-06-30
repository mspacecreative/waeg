<?php
if ( have_rows('traditional_names', get_the_ID()) ) {
    echo 
    '
    <div class="boxed bg--light-gray">
        <h2 class="no-top-margin has-large-font-size bottom-margin-1em bg--light-green color--white">' . esc_html__('Traditional Names', 'waeg') . '</h2>
        <strong style="color: var(--wp--preset--color--light--green);">' . esc_html_x('Gwich&#8217;in', 'waeg') . '</strong>
        <ul class="no-bullets">';
        while ( have_rows('traditional_names', get_the_ID()) ) {
            the_row();
            if ( $names = get_row() ) {
            $i = 0;
            foreach ($names as $key => $value) {
                if (!empty($value) ) { 
                $field = get_sub_field_object( $key );
                echo
                '<li class="has-medium-font-size">' . '<strong>' . $field['label'] . ':</strong> ' . $value . '</li>';
                }
                if (++$i == 2) break;
            }
            }
        }
        echo 
        '</ul>
        <strong style="color: var(--wp--preset--color--light--green); margin-top: 20px; padding-top: 20px; border-top: 1px solid var(--wp--preset--color--gray);">' . esc_html_x('Inuvialuktun', 'waeg') . '</strong>
        <ul class="no-bullets no-bottom-margin">';
        while ( have_rows('traditional_names', get_the_ID()) ) {
            the_row();
            if ( $names = get_row() ) {
                foreach (array_slice($names, 2) as $key => $value) {
                    if (!empty($value) ) { 
                    $field = get_sub_field_object( $key );
                    echo
                    '<li class="has-medium-font-size">' . '<strong>' . $field['label'] . ':</strong> ' . $value . '</li>';
                    }
                }
            }
        }
        echo 
        '</ul>
    </div>';
}