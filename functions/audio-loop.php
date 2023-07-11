<?php
function audio_loop() {
    if ( have_rows('gwichya_dialect', get_the_ID()) ) {
        while ( have_rows('gwichya_dialect', get_the_ID()) ) {
            the_row();
            $audiofile = get_sub_field('audio_file');
            $i = 1;
            echo
            '<button class="audio-trigger" title="' . esc_html_x('Click button to listen to audio track', 'waeg') . '"><i class="fa fa-volume-up"></i></button>
            <audio src="' . $audiofile . '"></audio>';
        }
    }
}