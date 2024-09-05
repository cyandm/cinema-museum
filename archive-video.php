<?php get_header() ?>

<?php cyn_get_component( 'breadcrumb' ) ?>

<?php cyn_get_page( '/archive/hero', [ 'field_name' => 'archive_video_img' ] ) ?>

<div class="py-2"></div>

<?php cyn_get_page( '/archive/category', [ 'taxonomy' => CYN_VIDEO_CATEGORY_TAXONOMY, 'title' => __( 'دسته بندی', 'cyn-dm' ), 'post-type' => CYN_VIDEO_POST_TYPE ] ) ?>

<div class="py-2"></div>

<?php cyn_get_page( '/archive/posts', [ 'post-type' => CYN_VIDEO_POST_TYPE ] ) ?>

<div class="py-2"></div>

<?php cyn_get_page( '/archive/pagination' ) ?>

<?php get_footer() ?>