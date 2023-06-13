<?php
if ( have_rows('traditional_names', get_the_ID()) ) {
    echo 
    '
    <div class="boxed bg--light-gray">
        <h3 class="no-top-margin has-medium-font-size bottom-margin-1em bg--light-green color--white">Traditional Names</h3>
        <ul class="no-bullets no-bottom-margin">';
        while ( have_rows('traditional_names', get_the_ID()) ) {
            the_row();
            if ( $names = get_row() ) {
            foreach ($names as $key => $value) {
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