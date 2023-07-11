<?php
if ( have_rows('traditional_names', get_the_ID()) ) {
    echo 
    '
    <div class="boxed bg--light-gray">
        <h2 class="no-top-margin has-large-font-size bottom-margin-1em bg--light-green color--white">' . esc_html__('Traditional Names', 'waeg') . '</h2>';
        while (have_rows('traditional_names', get_the_ID()) ) {
        the_row();
        if (!empty(get_sub_field('gwichya_name') || get_sub_field('teetlit_name')))
        echo '<strong class="underlined-heading font-weight-normal font-size-22">' . esc_html_x('Gwich&#8217;in', 'waeg') . '</strong>';
        }
        echo
        '<ul class="no-bullets">';
        audio_loop();
        while ( have_rows('traditional_names', get_the_ID()) ) {
            the_row();
            if ( $names = get_row() ) {
                foreach (array_slice($names,0,2) as $key => $value) {
                    if (!empty($value) ) { 
                        $field = get_sub_field_object( $key );
                        echo
                        '<li class="has-medium-font-size">' . '<strong>' . $field['label'] . ':</strong> ' . $value . '</li>';
                    }
                }
            }
        }
        echo 
        '</ul>';
        while (have_rows('traditional_names', get_the_ID()) ) {
        the_row();
        if (!empty(get_sub_field('siglitun_name') || get_sub_field('uummarmiutun') || get_sub_field('kangiryarmiutun')))
        echo
        '<strong class="underlined-heading font-weight-normal font-size-22">' . esc_html_x('Inuvialuktun', 'waeg') . '</strong>';
        }
        echo
        '<ul class="no-bullets">';
        while ( have_rows('traditional_names', get_the_ID()) ) {
            the_row();
            if ( $names = get_row() ) {
                foreach (array_slice($names,2,3) as $key => $value) {
                    if (!empty($value) ) { 
                    $field = get_sub_field_object( $key );
                    echo
                    '<li class="has-medium-font-size">' . '<strong>' . $field['label'] . ':</strong> ' . $value . '</li>';
                    }
                }
            }
        }
        echo 
        '</ul>';
        while (have_rows('traditional_names', get_the_ID()) ) {
        the_row();
        if (!empty(get_sub_field('siglitun_name') || get_sub_field('uummarmiutun') || get_sub_field('kangiryarmiutun')))
        echo
        '<strong class="underlined-heading font-weight-normal font-size-22">' . esc_html_x('French and English', 'waeg') . '</strong>';
        }
        echo
        '<ul class="no-bullets no-bottom-margin">';
        while ( have_rows('traditional_names', get_the_ID()) ) {
            the_row();
            if ( $names = get_row() ) {
                foreach (array_slice($names,5) as $key => $value) {
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