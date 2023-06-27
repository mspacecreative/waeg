<?php
$intro = get_field('intro', get_the_ID());
if ( !empty($intro) ):
    echo $intro;
endif;