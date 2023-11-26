<?php
/* Template Name: Virtual Tour */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
        <?php
        $block_content = do_blocks( '
            <!-- wp:group {"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
            <!-- wp:post-content /-->
            </div>
            <!-- /wp:group -->'
        );
        ?>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

        <div class="wp-site-blocks">

            <header class="wp-block-template-part site-header">
                <?php block_header_area(); ?>
            </header>

            <?php echo $block_content; ?>

            <footer class="wp-block-template-part site-footer">
            <?php block_footer_area(); ?>
            </footer>

        </div>

        <?php include 'functions/patterns/post-modal-loop.php'; ?>
        
        <?php wp_footer(); ?>

    </body>
</html>

