<?php
$term_id = get_the_terms(get_the_ID(), 'species');
$term_slug = array_shift($term_id);
$slug = $term_slug->slug;
$language_check = ICL_LANGUAGE_CODE == 'fr' && $slug !== 'baies' ? 'visite-virtuelle' . '/' . $slug : ICL_LANGUAGE_CODE == 'fr' && $slug == 'baies' ? 'visite-virtuelle' . '/' : $slug !== 'berries' ? 'virtual-tour' . '/' . $slug : 'virtual-tour' . '/';
switch($slug) {
    case 'flowering-plants':
        $slug = 'flowering-plants';
        break;
    case 'shrubs':
        $slug = 'shrubs';
        break;
    case 'trees':
        $slug = 'trees';
        break;
    case 'other-important-plants-and-species':
        $slug = 'other-important-plants-and-species';
        break;
    default:
        $slug = '';
        break;
}
echo 
'<div class="wp-block-button anchor-link__button">
    <a class="wp-element-button wp-block-button__link" href="' . home_url($language_check) . '#';
    $title = sanitize_title(get_the_title());
    echo $title;
    echo
    '">' . esc_html_x('View in Virtual Tour', 'waeg') . '</a>
</div>';