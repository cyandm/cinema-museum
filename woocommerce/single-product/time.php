<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( empty( get_field( 'duration', $product->get_id() ) ) )
	return;
?>

<div class="flex gap-1 items-center my-3">
	<svg class="icon">
		<use href="#icon-time-clock" />
	</svg>
	<span><?php echo get_field( 'duration', $product->get_id() ) ?></span>
</div>