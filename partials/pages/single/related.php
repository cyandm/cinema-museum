<?php
$related = $args['related'] ?? [];
$post_type = $args['post-type'] ?? CYN_VIDEO_POST_TYPE;
$taxonomy = $args['taxonomy'] ?? CYN_VIDEO_CATEGORY_TAXONOMY;

$terms = [];

foreach ( get_the_terms( get_the_ID(), $taxonomy ) as $term ) {
	array_push( $terms, $term->term_id );
}


if ( empty( $related ) ) {
	$related = get_posts( [ 
		'post_type' => $post_type,
		'posts_per_page' => 4,
		'post__not_in' => [ get_the_ID() ],
		'tax_query' => [ 
			[ 
				'taxonomy' => $taxonomy,
				'field' => 'term_id',
				'terms' => $terms
			]
		],
		'fields' => 'ids',
	] );
}

?>

<?php if ( count( $related ) > 0 ) : ?>
	<div class="container">
		<span class="text-2xl">
			<?php _e( 'شاید بپسندید', 'cyn-dm' ) ?>
		</span>

		<div class="py-2"></div>

		<div class="flex gap-4 overflow-auto">

			<?php foreach ( $related as $index => $post ) : ?>
				<?php cyn_get_card( 'general', [ 'post-id' => $post, 'post-type' => $post_type, 'is_responsive' => false ] ) ?>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>