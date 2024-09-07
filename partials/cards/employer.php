<?php
$post_id = $args['post-id'] ?? get_the_ID();
?>

<a class="group ">
	<div
		 class="rounded-xl h-30 bg-cover p-4 flex flex-col justify-end after:transition-all after:duration-300 border border-white/15 hover:border-red-600 transition-all">


		<div class="grid gap-2">
			<span class="text-lg"><?php echo get_the_title( $post_id ) ?></span>

			<div class="flex items-center justify-between">
				<div class="space-y-2 text-white/65">
					<div class="flex gap-1 items-center">
						<span class="text-sm"><?php echo get_field( 'position', $post_id ) ?></span>
					</div>
					<div class="flex gap-1 items-center">
						<span class="text-sm"><?php echo get_field( 'from_year', $post_id ) ?></span>
					</div>
				</div>


			</div>
		</div>

	</div>
</a>