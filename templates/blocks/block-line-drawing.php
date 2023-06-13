<?php
$linedrawing = get_field('drawing', get_the_ID());
if ( !empty($linedrawing) ): ?>
<img class="full-width object-fit-contain max-height-600 line-drawing" src="<?php echo esc_url($linedrawing['url']); ?>" alt="<?php echo esc_attr($linedrawing['alt']); ?>" />
<?php endif;