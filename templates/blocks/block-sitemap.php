<h2 id="posts">Plants</h2>
<ul>
<?php
    $not_in = array(); //to avoid naming the same post over and over
    //get top level terms
    $Parent_terms = get_terms( 'species', array('orderby' => 'name','parent' => 0));
    foreach ($Parent_terms as $term) {
        echo "<li><h3>".$term->name."</h3>";
        echo "<ul>";
        //get all children of each term
        $child_terms = get_terms( 'species', array('orderby' => 'name','parent' => $term->ID));
        foreach ((array)$child_terms as $t){
            echo "<li><h4>".$t->name."</h4>";
            echo "<ul>";
            $args = array(
                'post__not_in' => $not_in,
                'post_type' => 'my_posttype',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'species',
                        'field' => 'slug',
                        'terms' => $t->slug
                    )
                )
            );
            $new = new WP_Query($args);
            while ($new->have_posts()) {
                $new->the_post();
                $not_in[] = $post->ID;
                echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                //here you should check for children posts and output them 
            }
            echo "</ul>";
            echo "</li>";
        }
        //get all posts that are only listed in top level term
        $args = array(
            'post__not_in' => $not_in,
            'post_type' => 'my_posttype',
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
            //here you should check for children posts and output them 
        }
        echo "</ul>";
        echo "</li>";
    } ?>
 </ul>