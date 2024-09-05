<?php if ( empty( $_GET['s'] ) )
	return; ?>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 my-10">
	<?php

	while ( have_posts() ) {
		the_post();

		switch ( $post->post_type ) {
			case CYN_PODCAST_POST_TYPE:
			case CYN_VIDEO_POST_TYPE:
				cyn_get_card( $post->post_type, [ 'post-id' => $post->ID ] );
				return;

			default:
				echo 'no template found';
				return;
		}
	}
	?>
</div>