<?php
$uses = get_field('traditional_uses', get_the_ID());
if ( $uses ) {
    echo 
    '<div class="top-margin-40 has-medium-font-size">
        <h2 class="has-large-font-size">' . esc_html('Traditional Uses') . '</h2>';
    echo
        '<div class="notes">' . $uses . '</div>
    </div>';
}