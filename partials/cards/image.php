<?php
$post_id = $args['post-id'] ?? get_the_ID();
?>

<div data-post-id="<?php echo $post_id ?>"
	 class="group cursor-pointer | image-card">
	<div class="h-80 min-w-80 bg-cover rounded-xl p-4 flex flex-col justify-end after:content-[''] relative after:absolute after:inset-0 after:bg-gradient-to-t after:from-black after:from-30% after:to-transparent after:opacity-50 after:-z-10 isolate group-hover:after:opacity-30 after:transition-all after:duration-300"
		 style="background-image: url('<?php echo get_the_post_thumbnail_url( $post_id ) ?>');">


		<div class="grid gap-2">
			<span class="text-lg"><?php echo get_the_title( $post_id ) ?></span>

			<div class="flex items-center justify-between">
				<div class="space-y-2 text-white/65">
					<div class="flex gap-1 items-center">
						<span class="text-sm"><?php echo get_field( 'photographer', $post_id ) ?></span>
					</div>
					<div class="flex gap-1 items-center">
						<span class="text-sm"><?php echo get_field( 'short_description', $post_id ) ?></span>
					</div>
				</div>


			</div>
		</div>

	</div>
</div>