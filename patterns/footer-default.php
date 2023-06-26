<?php
/**
 * Title: Default Footer
 * Slug: waeg/footer-default
 * Categories: footer
 * Block Types: core/template-part/footer
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--40);">
		<?php echo esc_html_x('&copy; ', 'waeg'), date('Y '), get_bloginfo('title'), esc_html_x('. All rights reserved.', 'waeg' ); ?>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
