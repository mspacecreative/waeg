<?php
function my_add_excerpts_to_pages() {
     add_post_type_support( 'plant', 'excerpt' ); //change page with your post type slug.
}
add_action( 'init', 'my_add_excerpts_to_pages' );