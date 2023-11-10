<?php
$uses = get_field('traditional_uses', get_the_ID($term_id));
if ( $uses ) {
    echo 
    '<div class="has-medium-font-size">
        <h2 class="has-large-font-size">' . esc_html__('Traditional Uses', 'waeg') . '</h2>';
    echo
        '<div class="notes">' . $uses . '</div>
    </div>';
}