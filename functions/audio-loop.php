<?php
function audio_loop() {
    if ( have_rows('gwichya_dialect', get_the_ID()) ) {
        while ( have_rows('gwichya_dialect', get_the_ID()) ) {
            the_row();
            $audiofile = get_sub_field('audio_file');
            echo
            '<button class="audio-trigger"><i class="fa fa-volume-up"></i></button>
            <audio src="' . $audiofile . '"></audio>';
        }
    }
}