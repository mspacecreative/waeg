<?php
/* Template Name: Virtual Tour */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
        <?php
        $block_content = do_blocks( '
        <!-- wp:template-part {"slug":"header","tagName":"header"} /-->

        <!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
        <main class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50)">
            <!-- wp:group {"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:template-part {"slug":"post-title"} /-->
            </div>
            <!-- /wp:group -->
        
            <!-- wp:post-content {"layout":{"type":"constrained"}} /-->
        </main>
        <!-- /wp:group -->
        
        <!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->'
        );
        ?>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

        <div class="wp-site-blocks">

            <?php echo $block_content; ?>

        </div>

        <?php include 'functions/patterns/post-modal-loop.php'; ?>
        
        <?php wp_footer(); ?>

    </body>
</html>

