<?php
$id = $args['post-id'] ?? '';

?>


<div class="relative">
	<div class="absolute top-4 right-4 bg-stone-800 rounded-full p-3 cursor-pointer"
		 id="closePopUp">
		<svg class="icon">
			<use href="#icon-xmark" />
		</svg>
	</div>
	<?php echo get_the_post_thumbnail( $id, 'full', [ 'class' => 'rounded-2xl max-w-[90vw] max-h-[90vh] object-contain bg-stone-900' ] ) ?>

	<div class="absolute -bottom-8 right-4">

		<div class="grid">
			<span class="text-lg"><?php echo get_the_title( $id ) ?></span>
		</div>
	</div>
</div>