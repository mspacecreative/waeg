<?php
function post_modal() {
    get_template_part('patterns/post-modal-loop');
}
add_action( 'wp_footer', 'post_modal' );