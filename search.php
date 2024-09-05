<?php get_header(); ?>

<?php cyn_get_component( 'breadcrumb' ) ?>

<?php cyn_get_page( '/search/filter' ) ?>

<div class="container">
	<?php

	if ( have_posts() ) {
		cyn_get_page( '/search/posts' );
	} else {
		cyn_get_component( 'search-not-found' );
	}
	?>
</div>

<?php get_footer() ?>