<?php
// CUSTOM CLASS	
$className = '';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if ( have_rows('traditional_names', get_the_ID()) ) {
    echo 
    '<div class="boxed bg--light-gray' . esc_attr($className) . '">
        <h2 class="no-top-margin has-large-font-size bottom-margin-1em bg--light-green color--white">' . esc_html__('Traditional Names', 'waeg') . '</h2>';
        while ( have_rows('traditional_names', get_the_ID()) ) {
            the_row();
            if ( have_rows('gwichya_dialect') ) {
                while ( have_rows('gwichya_dialect') ) {
                    the_row();
                    if (!empty(get_sub_field('gwichya_name')))
                        echo '<strong class="underlined-heading font-size-22">' . esc_html_x('Gwich&#8217;in', 'waeg') . '</strong>';
                }
            }
            if (have_rows('gwichya_dialect')) {
                echo
                '<ul class="no-bullets">';
                while ( have_rows('gwichya_dialect') ) {
                    the_row();
                    $audiofile = get_sub_field('audio_file') ? '<button class="audio-trigger" type="button" title="' . esc_html_x('Click button to listen to audio track', 'waeg') . '"><i class="fa fa-volume-up"></i></button><audio src="' . get_sub_field('audio_file') . '"></audio>' : '';
                    $name = get_sub_field('gwichya_name') ? '<li class="has-medium-font-size position-relative">' . '<strong class="color--dark-green">' . esc_html_x('Gwichya', 'waeg') . ':</strong> ' . get_sub_field('gwichya_name') . $audiofile . '</li>' : '';
                    $audiofile_teetlit = get_sub_field('audio_file_teetlit') ? '<button class="audio-trigger" type="button" title="' . esc_html_x('Click button to listen to audio track', 'waeg') . '"><i class="fa fa-volume-up"></i></button><audio src="' . get_sub_field('audio_file_teetlit') . '"></audio>' : '';
                    $teetlit_name = get_sub_field('teetlit_name') ? '<li class="has-medium-font-size position-relative">' . '<strong class="color--dark-green">' . esc_html_x('Teetł&#8217;it', 'waeg') . ':</strong> ' . get_sub_field('teetlit_name') . $audiofile_teetlit . '</li>' : '';
                    
                    echo $name, $teetlit_name;
                }
                echo 
                '</ul>';
            }
        }
        while (have_rows('traditional_names', get_the_ID()) ) {
            the_row();
            if (!empty(get_sub_field('siglitun_name') || get_sub_field('uummarmiutun') || get_sub_field('kangiryarmiutun')))
            echo
            '<strong class="underlined-heading font-size-22">' . esc_html_x('Inuvialuktun', 'waeg') . '</strong>';
        }
        echo
        '<ul class="no-bullets">';
        while ( have_rows('traditional_names', get_the_ID()) ) {
            the_row();
            if ( $names = get_row() ) {
                foreach (array_slice($names,1,4) as $key => $value) {
                    if (!empty($value) ) { 
                        $field = get_sub_field_object( $key );
                        echo
                        '<li class="has-medium-font-size">' . '<strong class="color--dark-green">' . $field['label'] . ':</strong> ' . $value . '</li>';
                    }
                }
            }
        }
        echo 
        '</ul>';
        while (have_rows('traditional_names', get_the_ID()) ) {
            the_row();
            if ( empty(get_sub_field('french')) && !empty(get_sub_field('common_names')) ) {
                echo
                '<strong class="underlined-heading font-size-22">' . esc_html_x('English', 'waeg') . '</strong>';
            } elseif ( !empty(get_sub_field('french')) && empty(get_sub_field('common_names')) ) {
                echo
                '<strong class="underlined-heading font-size-22">' . esc_html_x('French', 'waeg') . '</strong>';
            } elseif ( !empty(get_sub_field('french') && get_sub_field('common_names')) ) {
                echo
                '<strong class="underlined-heading font-size-22">' . esc_html_x('French and English', 'waeg') . '</strong>';
            }
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
                    '<li class="has-medium-font-size">' . '<strong class="color--dark-green">' . esc_html_x($field['label'], 'waeg') . ':</strong> ' . $value . '</li>';
                    }
                }
            }
        }
        echo 
        '</ul>
    </div>';
}