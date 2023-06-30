<?php
if ( have_rows('traditional_names', get_the_ID()) ) {
    echo 
    '
    <div class="boxed bg--light-gray">
        <h2 class="no-top-margin has-large-font-size bottom-margin-1em bg--light-green color--white">' . esc_html__('Traditional Names', 'waeg') . '</h2>
        <ul class="no-bullets no-bottom-margin">';
        while ( have_rows('traditional_names', get_the_ID()) ) {
            the_row();
            if ( $names = get_row() ) {
            foreach ($names as $key => $value) {
                if (!empty($value) ) { 
                $i = 0;
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
    </div>';
}