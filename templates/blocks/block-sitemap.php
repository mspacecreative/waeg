
<?php
$posttype = get_field('post_type');
$label = $posttype['label'];
$value = $posttype['value'];
?>
<h3><?php echo $label ?></h2>
<ul>
<?php
    $not_in = array(); //to avoid naming the same post over and over
    //get top level terms

    if ( $value == 'plant') {
        $species = get_terms( 'species' );
        foreach ($species as $term) {
            echo "<li><a href=" . esc_url(get_term_link($term)) . "><strong>" . $term->name . "</strong></a>";
            echo "<ul>";
            //get all posts that are only listed in top level term
            $args = array(
                'post__not_in' => $not_in,
                'post_type' => $value,
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'species',
                        'field' => 'slug',
                        'terms' => $term->slug
                        )
                    )
            );
            $new = new WP_Query($args);
            while ($new->have_posts()) {
                $new->the_post();
                $not_in[] = $post->ID;
                echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
            }
            echo "</ul>";
            echo "</li>";
        }
    } else {
        $args = array(
            'post__not_in' => $not_in,
            'post_type' => $value,
            'posts_per_page' => -1,
            'orderby' => 'name',
            'order' => 'DESC'
        );
        $new = new WP_Query($args);
        while ($new->have_posts()) {
            $new->the_post();
            $not_in[] = $post->ID;
            echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
        }
    } ?>
 </ul>