<?php
function post_modal() {
    include 'patterns/post-modal-loop.php';
}
add_action( 'wp_footer', 'post_modal', 1 );