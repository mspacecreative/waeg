<?php
function post_modal() {
    ob_start();
    include 'patterns/post-modal.php';
    ob_clean();
}
add_action( 'wp_footer', 'post_modal' );