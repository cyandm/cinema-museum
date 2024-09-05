<?php
$post_id = $args['post-id'] ?? get_the_ID();
$post_type = $args['post-type'] ?? CYN_VIDEO_POST_TYPE;

$options = [ 
	'is_responsive' => $args['is_responsive'] ?? true,
];

if ( $post_type === CYN_VIDEO_POST_TYPE ) {
	$options['icon'] = '#icon-play';
} else if ( $post_type === CYN_PODCAST_POST_TYPE ) {
	$options['icon'] = '#icon-Mic,-Rec';
}
?>
<a href="<?php echo get_permalink( $post_id ) ?>"
   class="group rounded-xl overflow-hidden <?php echo $options['is_responsive'] ? 'max-sm:hidden' : '' ?>">
	<div class="h-80 min-w-80 bg-cover rounded-xl p-4 flex flex-col justify-end after:content-[''] relative after:absolute after:inset-0 after:bg-gradient-to-t after:from-black after:from-30% after:to-transparent after:opacity-50 after:-z-10 isolate group-hover:after:opacity-30 after:transition-all after:duration-300"
		 style="background-image: url('<?php echo get_the_post_thumbnail_url( $post_id ) ?>');">


		<div class="grid gap-2">
			<span class="text-lg"><?php echo get_the_title( $post_id ) ?></span>

			<div class="flex items-center justify-between">
				<div class="space-y-2">
					<?php if ( $post_type === CYN_VIDEO_POST_TYPE ) : ?>
						<div class="flex gap-1 items-center">
							<svg class="icon text-yellow-400">
								<use href="#icon-star-fill" />
							</svg>
							<span class="text-sm"><?php echo get_field( 'rate', $post_id ) ?></span>
						</div>
					<?php endif; ?>

					<div class="flex gap-1 items-center">
						<svg class="icon">
							<use href="#icon-time-clock" />
						</svg>
						<span class="text-sm"><?php echo get_field( 'duration', $post_id ) ?></span>
					</div>
				</div>

				<div>

					<div class="bg-white rounded-full p-2 group group-hover:bg-red-800 transition-colors">
						<svg class="icon size-8 text-black group-hover:text-white transition-colors">
							<use href="<?php echo $options['icon'] ?>" />
						</svg>
					</div>
				</div>
			</div>
		</div>

	</div>
</a>

<?php if ( $options['is_responsive'] ) : ?>
	<a href="<?php echo get_permalink( $post_id ) ?>"
	   class="md:hidden">
		<div class="flex justify-between bg-white/10 p-4 rounded-lg">
			<div class="flex gap-2">
				<div class="size-28">
					<?php echo wp_get_attachment_image( get_post_thumbnail_id( $post_id ), 'full', false, [ 'class' => 'w-full h-full object-cover rounded-md' ] ) ?>
				</div>
				<div class="space-y-4">
					<div>
						<span class="text-sm"><?php echo get_the_title( $post_id ) ?></span>
					</div>

					<div class="space-y-2">


						<?php if ( $post_type === CYN_VIDEO_POST_TYPE ) : ?>
							<div class="flex gap-1 items-center">
								<svg class="icon size-4 text-yellow-400">
									<use href="#icon-star-fill" />
								</svg>
								<span class="text-xs"><?php echo get_field( 'rate', $post_id ) ?></span>
							</div>
						<?php endif; ?>

						<div class="flex gap-1 items-center">
							<svg class="icon size-4">
								<use href="#icon-time-clock" />
							</svg>
							<span class="text-xs"><?php echo get_field( 'duration', $post_id ) ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="flex justify-end items-end">
				<div class="bg-white rounded-full p-2 group group-hover:bg-red-800 transition-colors">
					<svg class="icon size-6 text-black group-hover:text-white transition-colors">
						<use href="<?php echo $options['icon'] ?>" />
					</svg>
				</div>
			</div>
		</div>
	</a>
<?php endif; ?>