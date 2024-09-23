<?php
$id = $args['post-id'] ?? '';
$acf_field = $args['acf-field'] ?? '';
$video = get_field( $acf_field, $id );
$poster = get_field( 'file_poster', $id );

if ( ! $video )
	return;
?>

<div class="relative">
	<div class="absolute -top-8 -right-8 bg-stone-800 rounded-full p-3 cursor-pointer"
		 id="closePopUp">
		<svg class="icon">
			<use href="#icon-xmark" />
		</svg>
	</div>

	<video class="plyr-js"
		   playsinline
		   controls
		   autoplay
		   data-poster="<?php echo wp_get_attachment_url( $poster ) ?>">

		<source src="<?php echo $video['url'] ?> "
				type="<?php echo $video['mime_type'] ?>" />

	</video>



	<div class="absolute -bottom-16 right-0">

		<div class="grid">
			<span class="text-lg"><?php echo get_the_title( $id ) ?></span>
		</div>
	</div>



</div>