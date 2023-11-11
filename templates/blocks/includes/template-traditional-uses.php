<?php
$uses = get_field('traditional_uses', get_the_ID($term_id));
if ( $uses ) {
    echo 
    '<div>
        <h2 class="has-large-font-size" style="margin-block-start: 0;">' . esc_html__('Traditional Uses', 'waeg') . '</h2>
        <div class="notes">' 
            . $uses . 
        '</div>
    </div>';
}