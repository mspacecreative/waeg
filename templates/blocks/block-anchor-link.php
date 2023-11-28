<?php
$term_id = get_the_terms(get_the_ID(), 'species');
$term_slug = array_shift($term_id);
$slug = $term_slug->slug;
switch($slug) {
    case 'berries':
        $slug = 'berries';
        break;
    case 'baies':
        $slug = 'baies';
        break;
    case 'flowering-plants':
        $slug = 'flowering-plants';
        break;
    case 'plantes-a-fleurs':
        $slug = 'plantes-a-fleurs';
        break;
    case 'shrubs':
        $slug = 'shrubs';
        break;
    case 'arbustes':
        $slug = 'arbustes';
        break;
    case 'trees':
        $slug = 'trees';
        break;
    case 'des-arbres':
        $slug = 'des-arbres';
        break;
    case 'other-important-plants':
        $slug = 'other-important-plants';
        break;
    case 'autres-plantes-importantes':
        $slug = 'autres-plantes-importantes';
        break;
    default:
        $slug = '';
        break;
}
$language_check = (ICL_LANGUAGE_CODE == 'fr' && $slug !== 'baies') ? 'visite-virtuelle' . '/' . $slug : (ICL_LANGUAGE_CODE == 'fr') ? 'visite-virtuelle' . '/' : $slug !== 'berries' ? 'virtual-tour' . '/' . $slug : 'virtual-tour' . '/';
echo 
'<div class="wp-block-button anchor-link__button">
    <a class="wp-element-button wp-block-button__link" href="' . home_url($language_check) . '#';
    $title = sanitize_title(get_the_title());
    echo $title;
    echo
    '">' . esc_html_x('View in Virtual Tour', 'waeg') . '</a>
</div>';