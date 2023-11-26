<?php
function post_modal() {
    include 'patterns/post-modal-loop.php';
}
add_action( 'wp_body_open', 'post_modal' );