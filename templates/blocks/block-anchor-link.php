<?php
echo 
'<a class="anchor-link__button" href="' . home_url('virtual-tour') . '#';
    $title = sanitize_title(get_the_title());
    echo $title;
echo
'">View in Virtual Tour</a>';