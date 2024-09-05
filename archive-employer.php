<?php get_header() ?>

<?php cyn_get_component( 'breadcrumb' ) ?>

<?php cyn_get_page( '/archive/hero', [ 'field_name' => 'archive_employer_img' ] ) ?>

<div class="py-2"></div>

<?php cyn_get_page( '/archive/posts-by-category', [ 'tax' => CYN_EMPLOYER_CATEGORY_TAXONOMY, 'post_type' => CYN_EMPLOYER_POST_TYPE ] ) ?>


<?php get_footer() ?>