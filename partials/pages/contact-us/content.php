<div class="container flex flex-col-reverse md:flex-row my-6 gap-8">
	<div class="flex-1 space-y-4">
		<span class="text-3xl">
			<?php _e( 'تماس با ما', 'cyn-dm' ) ?>
		</span>

		<div>
			<?php cyn_get_page( '/contact-us/form' ) ?>
		</div>
	</div>

	<div class="flex-1">
		<?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'full', false, [ 'class' => 'w-full h-full rounded-lg' ] ) ?>
	</div>
</div>