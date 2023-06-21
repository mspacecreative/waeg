<?php
if (have_rows('people_and_plants', get_the_ID())) {
    while (have_rows('people_and_plants', get_the_ID())) {
        the_row();
        $quote = get_sub_field('quote');
        $author = get_sub_field('author');
        if ( $quote ) {
            echo
            '
            <div class="quote-container people-and-plants">
                <h2 class="has-large-font-size">' . esc_html__('People and Plants', 'waeg') . '</h2>
                <div class="quote">' 
                    . $quote . 
                '</div>
                <div class="author">' . $author . '</div>
            </div>';
        }
    }
}