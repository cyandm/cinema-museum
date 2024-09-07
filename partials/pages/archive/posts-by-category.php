<?php
$tax_name = $args['tax'];
$post_type = $args['post_type'];
$is_swiper = $args['is_swiper'] ?? false;

$terms = get_terms( [ 
	'taxonomy' => $tax_name,
	'hide_empty' => false,
] );
function sort_terms( WP_Term $term1, WP_Term $term2 ) {
	return get_field( 'position', $term1->taxonomy . '_' . $term1->term_id ) > get_field( 'position', $term2->taxonomy . '_' . $term2->term_id );
}

usort( $terms, 'sort_terms' );

?>

<!--posts-->
<div class="container space-y-6">
	<?php foreach ( $terms as $index => $term ) :
		$posts = get_posts( [ 
			'post_type' => $post_type,
			'posts_per_page' => -1,
			'tax_query' => [ 
				[ 
					'taxonomy' => $tax_name,
					'terms' => [ $term->term_id ],
				]
			],
			'fields' => 'id'

		] );

		?>
		<div class="space-y-4">
			<div class="flex justify-between">
				<span class="text-2xl">
					<?php echo $term->name ?>
				</span>

				<?php if ( $is_swiper ) : ?>
					<div class="flex gap-2">
						<div id="<?php echo 'term' . $term->term_id . 'prev' ?>">
							<svg class="bg-stone-800 icon border border-red-800 size-8 p-2 rounded-full -rotate-90">
								<use href="#icon-chevron-down" />
							</svg>
						</div>

						<div id="<?php echo 'term' . $term->term_id . 'next' ?>">
							<svg class="bg-stone-800 icon border border-red-800 size-8 p-2 rounded-full rotate-90">
								<use href="#icon-chevron-down" />
							</svg>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<?php if ( $is_swiper ) : ?>
				<swiper-container navigation-next-el="<?php echo '#term' . $term->term_id . 'next' ?>"
								  navigation-prev-el="<?php echo '#term' . $term->term_id . 'prev' ?>"
								  space-between="12"
								  slides-per-view="auto">
					<?php foreach ( $posts as $index => $post ) : ?>
						<swiper-slide class="max-w-80">
							<?php cyn_get_card( $post_type, [ 'post-id' => $post->ID ] ) ?>
						</swiper-slide>
					<?php endforeach; ?>
				</swiper-container>
			<?php else : ?>
				<div class="grid gap-2 grid-cols-1 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 ">
					<?php foreach ( $posts as $index => $post ) : ?>
						<?php cyn_get_card( $post_type, [ 'post-id' => $post->ID ] ) ?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>