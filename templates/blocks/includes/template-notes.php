<?php
$notes = get_field('notes', get_the_ID($term_id));
if ( $notes ) {
    echo
    '<div class="notes">' . $notes . '</div>';
}