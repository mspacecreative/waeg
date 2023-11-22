<?php
function post_modal() {
    ob_start();
    get_template_part('patterns/post-modal');
    ob_clean();
    echo 'stuff';
}
add_action( 'wp_footer', 'post_modal', 1 );