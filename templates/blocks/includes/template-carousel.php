<?php
$images = get_field('gallery', get_the_ID($term_id));
if ( $images ): ?>
<div class="swiper-container position-relative">
    <div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <?
        foreach ($images as $image) : ?>
        <div class="swiper-slide"><a href="<?php echo esc_url($image['sizes']['large']); ?>" data-fslightbox="lightbox-<?php echo $title ?>" data-type="image"><img src="<?php echo esc_url($image['sizes']['swiper-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a></div>
        <?php
        endforeach; ?>
    </div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
</div>
<?php
endif;