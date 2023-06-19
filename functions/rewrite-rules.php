<?php
add_action('init', 'custom_rewrite_basic');
function custom_rewrite_basic() {
    add_rewrite_rule('^plants/([^/]+)/?$', 'index.php?taxonomy=species&species=$matches[1]', 'top');
}