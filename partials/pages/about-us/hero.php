<?php
$audio = get_field( 'hero_video' );
$poster = get_field( 'hero_poster' );


if ( empty( $audio ) )
	return;
?>

<div class="container rounded-xl overflow-hidden">
	<video class="plyr-js"
		   playsinline
		   controls
		   data-poster="<?php echo wp_get_attachment_url( $poster ) ?>">

		<source src="<?php echo $audio['url'] ?> "
				type="<?php echo $audio['mime_type'] ?>" />

	</video>
</div>