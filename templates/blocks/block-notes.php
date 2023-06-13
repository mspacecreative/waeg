<?php
$notes = get_field('notes', get_the_ID());
$post = get_queried_object();
$postType = get_post_type_object(get_post_type($post));
if ( $notes ) {
    if ($postType) {
    echo 
    '
    <div class="top-margin-40 has-medium-font-size">
    <h3 class="has-medium-font-size">' . esc_html($postType->labels->singular_name) . ' ' . esc_html('Notes') . '</h3>';
    }
    echo
    '<div class="notes">' . $notes . '</div>
    </div>';
}