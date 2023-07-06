<?php
$query = new WP_Query( array(
    'post_type' => 'plant',          // name of post type.
    'tax_query' => array(
        array(
            'taxonomy' => 'species',   // taxonomy name
            'field' => 'term_id',           // term_id, slug or name
            'terms' => get_queried_object()->term_id        // term id, term slug or term name
        )
    )
) ); ?>
<ul>
<?php while ( $query->have_posts() ) : $query->the_post();
    echo 
    '<li><a href=' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
endwhile; ?>
</ul>

<?php wp_reset_query();