<?php
function google_analytics() {
    echo
    '<script id="google_gtagjs-js-after">
    window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}
    gtag("set", "linker", {"domains":["ethnobotanygarden.com"]} );
    gtag("js", new Date());
    gtag("set", "developer_id.dZTNiMT", true);
    gtag("config", "UA-3578250-10", {"anonymize_ip":true});
    gtag("config", "G-FCNK66VXBM");
    </script>';
}
add_action('wp_head', 'google_analytics');