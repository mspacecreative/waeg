<?php
$loop = new WP_Query( array(
    'post_type' => 'plant',
    'orderby' => 'name',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'species',
            'field' => 'term_id',
            'terms' => get_queried_object()->term_id
        )
    )
) );
echo 
'<a class="anchor-link__button" href="' . home_url('virtual-tour') . '#';
while ( $loop->have_posts() ) : $loop->the_post();
    $title = sanitize_title(get_the_title($loop->ID));
    echo $title;
endwhile;
echo
'">View in Virtual Tour</a>';