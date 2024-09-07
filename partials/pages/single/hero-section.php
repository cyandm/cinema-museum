<?php
$post_id = $args['post-id'] ?? get_the_ID();
$post_type = $args['post-type'] ?? CYN_VIDEO_POST_TYPE;


if ( $post_type === CYN_VIDEO_POST_TYPE ) {
	$labels = [ 
		'download' => __( 'پخش ویدئو', 'cyn-dm' ),
	];
} else if ( $post_type === CYN_PODCAST_POST_TYPE ) {
	$labels = [ 
		'download' => __( 'پخش پادکست', 'cyn-dm' ),
	];
}
?>

<div class="container  grid md:gap-4 grid-cols-3">
	<div class="col-span-3 md:col-span-1">
		<?php echo wp_get_attachment_image( get_post_thumbnail_id( $post_id ), 'full', false, [ 'class' => 'w-full rounded-lg h-full object-cover' ] ) ?>
	</div>

	<div class="col-span-3 md:col-span-2">
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
			<a id="playBtn"
			   data-post-id="<?php echo get_the_ID() ?>"
			   class="primary-btn px-8"
			   href="#">
				<?php echo $labels['download'] ?>
			</a>
		</div>
	</div>

</div>