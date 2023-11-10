<?php
$notes = get_field('notes', get_the_ID($term_id));
if ( $notes ) {
    echo
    '<div class="notes">
        <h2 class="has-large-font-size">' . esc_html_x('Notes', 'waeg') . '</h2>'
         . $notes . 
    '</div>';
}