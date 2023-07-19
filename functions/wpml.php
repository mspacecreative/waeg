<?php
// WPML function to fix the translation of a template /fr/plante/especes/baies/
function wpmlsupp_10867( $templates ) {
    if ( current_theme_supports( 'block-templates' ) ) {
        $current_term = get_queried_object();
  
        do_action( 'wpml_switch_language', apply_filters( 'wpml_default_language', null ) );
        $orignal_term = get_term($current_term->term_id);
        do_action( 'wpml_switch_language', null );
  
        if (isset($orignal_term->slug) && $orignal_term->slug !== $current_term->slug ) {
            array_unshift($templates, 'taxonomy-' . $orignal_term->taxonomy . '-' . $orignal_term->slug);    
        }
    }
  
    return $templates;
  }
  add_filter('taxonomy_template_hierarchy', 'wpmlsupp_10867');

  function fix_archive_templates( $templates ) {
    if ( current_theme_supports( 'block-templates' ) ) {
        $current_archive = get_queried_object();
  
        do_action( 'wpml_switch_language', apply_filters( 'wpml_default_language', null ) );
        $orignal_archive = get_the_ID($current_archive);
        do_action( 'wpml_switch_language', null );
  
        if (isset($orignal_archive->slug) && $orignal_archive->slug !== $current_archive->slug ) {
            array_unshift($templates, 'archive-' . $orignal_archive->slug);    
        }
    }
  
    return $templates;
  }
  add_filter('archive_template_hierarchy', 'fix_archive_templates');