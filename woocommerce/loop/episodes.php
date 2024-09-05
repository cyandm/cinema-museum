<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;


if ( empty( get_field( 'episode_count', $product->get_id() ) ) )
	return;
?>

<div class="absolute top-2 right-2">
	<div class="flex gap-1 items-center my-3 bg-white/35 p-2 rounded-md backdrop-blur-lg">
		<svg class="icon">
			<use href="#icon-video-player-controls" />
		</svg>
		<span><?php echo get_field( 'episode_count', $product->get_id() ) . ' قسمت' ?></span>
	</div>
</div>