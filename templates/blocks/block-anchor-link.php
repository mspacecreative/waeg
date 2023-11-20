<?php
$term_id = get_term(get_the_ID(), 'species');
$term_slug = $term_id->slug;
$slug = '';
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
}
echo 
'<a class="anchor-link__button" href="' . home_url('virtual-tour') . $slug . '#';
    $title = sanitize_title(get_the_title());
    echo $title;
echo
'">View in Virtual Tour</a>';