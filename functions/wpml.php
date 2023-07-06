<?php
function wpmlsupp_10867( $templates ) {
    if ( current_theme_supports( 'block-templates' ) ) {
        $current_term = get_queried_object();
 
        do_action( 'wpml_switch_language', apply_filters( 'wpml_default_language', null ) );
        $original_term = get_term($current_term->term_id);
        do_action( 'wpml_switch_language', null );
 
        if (isset($original_term->slug) && $original_term->slug !== $current_term->slug ) {
            array_push($templates, $original_term->taxonomy . '-' . $original_term->slug);    
        }
    }
 
    return $templates;
}
add_filter('taxonomy_template_hierarchy', 'wpmlsupp_10867');