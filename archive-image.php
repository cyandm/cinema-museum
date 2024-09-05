<?php get_header() ?>

<?php cyn_get_component( 'breadcrumb' ) ?>

<div class="py-2"></div>

<?php cyn_get_page( '/archive/posts-by-category', [ 'tax' => CYN_IMAGE_CATEGORY_TAXONOMY, 'post_type' => CYN_IMAGE_POST_TYPE, 'is_swiper' => true ] ) ?>


<?php get_footer() ?>