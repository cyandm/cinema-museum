<?php
$id = $args['post-id'] ?? '';
$video = get_field( 'file', $id );

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

	<audio class="plyr-js"
		   controls>
		<source src="<?php echo $video['url'] ?> "
				type="<?php echo $video['mime_type'] ?>" />
	</audio>





	<div class="absolute -bottom-8 right-4">

		<div class="grid">
			<span class="text-lg"><?php echo get_the_title( $id ) ?></span>
		</div>
	</div>
</div>