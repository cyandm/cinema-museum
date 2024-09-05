<?php
$post_id = $args['post-id'] ?? get_the_ID();
$post_type = $args['post-type'] ?? CYN_VIDEO_POST_TYPE;


if ( $post_type === CYN_VIDEO_POST_TYPE ) {
	$labels = [ 
		'download' => __( 'دانلود ویدئو', 'cyn-dm' ),
	];
} else if ( $post_type === CYN_PODCAST_POST_TYPE ) {
	$labels = [ 
		'download' => __( 'دانلود پادکست', 'cyn-dm' ),
	];
}
?>

<div class="container flex gap-4 flex-col md:flex-row">
	<div class="flex-1">
		<?php echo wp_get_attachment_image( get_post_thumbnail_id( $post_id ), 'full', false, [ 'class' => 'w-full rounded-lg h-full object-cover' ] ) ?>
	</div>

	<div class="flex-1 ">
		<h1 class="text-2xl">
			<?php echo get_the_title( $post_id ) ?>
		</h1>

		<?php if ( $post_type === CYN_VIDEO_POST_TYPE ) : ?>
			<div class="py-2"></div>

			<div class="flex gap-1 items-center">
				<svg class="icon text-yellow-400">
					<use href="#icon-star-fill" />
				</svg>
				<span><?php echo get_field( 'rate', $post_id ) ?></span>
			</div>
		<?php endif; ?>

		<div class="py-2"></div>

		<div class="flex gap-1 items-center">
			<svg class="icon">
				<use href="#icon-time-clock" />
			</svg>
			<span><?php echo get_field( 'duration', $post_id ) ?></span>
		</div>

		<div class="py-2"></div>

		<div class="text-white/65 [&_strong]:text-white [&_p]:mt-2 leading-loose">
			<?php the_content() ?>
		</div>

		<div class="py-2"></div>

		<div class="flex">
			<a class="primary-btn px-8"
			   href="<?php echo get_field( 'file' ) ? get_field( 'file' )['url'] : '#' ?>">
				<?php echo $labels['download'] ?>
			</a>
		</div>
	</div>

</div>