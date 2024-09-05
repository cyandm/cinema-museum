<div class="grid gap-9 container">
	<?php for ( $i = 1; $i <= 3; $i++ ) :
		$text = get_field( "text_$i" );
		$image = get_field( "img_$i" );

		if ( empty( $text ) || empty( $image ) )
			continue;
		?>

		<div class="flex gap-9 odd:flex-row-reverse max-md:!flex-col">
			<div class="flex-1">
				<?php echo wp_get_attachment_image( $image, 'full', false, [ 'class' => 'w-full h-full rounded-2xl' ] ) ?>
			</div>

			<div class="flex-1">
				<div
					 class="text-white/70 leading-loose font-thin [&_strong]:text-white [&_strong]:text-3xl [&_strong]:mb-4 [&_strong]:block">
					<?php echo $text ?>
				</div>
			</div>
		</div>

	<?php endfor; ?>
</div>