<?php
$botanical_names = get_field('botanical_names', get_the_ID());
if ( $botanical_names ) {
    echo
    '<div class="botanical-names bottom-margin-40">
        <h2 class="has-medium-font-size" style="margin-top: 0;"><strong>Botanical name(s):</strong> ' . $botanical_names . '</h2>
    </div>';
}