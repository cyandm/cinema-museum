<?php
$video = get_field( 'hero_video' );
$poster = get_field( 'hero_poster' );


if ( empty( $video ) )
	return;
?>

<div class="container rounded-xl overflow-hidden">
	<video class="plyr-js"
		   playsinline
		   controls
		   data-poster="<?php echo wp_get_attachment_url( $poster ) ?>">

		<source src="<?php echo $video['url'] ?> "
				type="<?php echo $video['mime_type'] ?>" />

	</video>
</div>