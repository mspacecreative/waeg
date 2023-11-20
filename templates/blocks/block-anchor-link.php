<?php
$term_id = get_the_terms(get_the_ID(), 'species');
$term_slug = array_shift($term_id);
$slug = $term_slug->slug;
switch($slug) {
    case 'flowers-and-herbs':
        $slug = 'flowers-and-herbs';
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
'<a class="wp-block-button__link anchor-link__button" href="' . home_url('virtual-tour') . $slug . '#';
    $title = sanitize_title(get_the_title());
    echo $title;
echo
'">View in Virtual Tour</a>';