<?php
// REMOVE POSTS MENU ITEM
function remove_menu () {
    remove_menu_page('edit.php');
    remove_menu_page('wordquest');
 } 
 add_action('admin_menu', 'remove_menu');
 
 function waeg_remove_newpost ( $wp_admin_bar ) {
     $wp_admin_bar->remove_node( 'new-post' );
 }
 add_action( 'admin_bar_menu', 'waeg_remove_newpost', 999 );