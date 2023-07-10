<?php
function audio_loop() {
    if ( have_rows('gwichya_dialect') )
        while (have_rows('gwichya_dialect') ) {
            the_row();
            $audiofile = get_sub_field('audio_file');
            echo
            '<audio src="' . $audiofile . '"></audio>';
        }
    }
}