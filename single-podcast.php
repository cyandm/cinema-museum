<?php
$post_id = get_the_ID();
$related_posts = get_field( 'related_podcasts' );

?>

<?php get_header() ?>

<?php cyn_get_component( 'breadcrumb' ) ?>

<?php cyn_get_page( '/single/hero-section', [ 'post-id' => $post_id, 'post-type' => CYN_PODCAST_POST_TYPE ] ) ?>

<div class="py-4"></div>

<?php cyn_get_page( '/single/related', [ 'related' => $related_posts, 'post-type' => CYN_PODCAST_POST_TYPE ] ) ?>

<?php get_footer() ?>