<?php
function post_modal() {
    // include 'patterns/post-modal-loop.php';
    echo 'test';
}
add_action( 'wp_head', 'post_modal' );