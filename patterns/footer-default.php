<?php
/**
 * Title: Default Footer
 * Slug: waeg/footer-default
 * Categories: footer
 * Block Types: core/template-part/footer
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"align":"right"} -->
	<p class="has-text-align-right">
	<?php
	printf(
		esc_html_e('&copy; '), esc_html_e(date('Y ')), esc_html_e(get_bloginfo('title', 'waeg')), esc_html_e('. All rights reserved.', 'waeg')
	)
	?>
	</p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
