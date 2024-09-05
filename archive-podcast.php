<?php get_header() ?>

<?php cyn_get_component( 'breadcrumb' ) ?>

<?php cyn_get_page( '/archive/hero', [ 'field_name' => 'archive_podcast_img' ] ) ?>

<div class="py-2"></div>

<?php cyn_get_page( '/archive/posts', [ 'post-type' => CYN_PODCAST_POST_TYPE, 'title' => __( 'پادکست ها', 'cyn-dm' ) ] ) ?>

<div class="py-2"></div>

<?php cyn_get_page( '/archive/pagination' ) ?>

<?php get_footer() ?>