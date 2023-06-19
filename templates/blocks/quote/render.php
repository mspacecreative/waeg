<?php
if (have_rows('people_and_plants', get_the_ID())) {
    while (have_rows('people_and_plants', get_the_ID())) {
        the_row();
        $quote = get_sub_field('quote');
        $author = get_sub_field('author');
        if ( $quote ) {
            echo
            '
            <h2 class="has-large-font-size">' . esc_html('People and Plants') . '</h2>
            <div class="quote people-and-plants">' 
                . $quote . 
                '<div class="author">' . $author . '</div>
            </div>';
        }
    }
}