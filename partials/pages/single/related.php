<?php
$related = $args['related'] ?? [];
$post_type = $args['post-type'] ?? CYN_VIDEO_POST_TYPE;
$taxonomy = $args['taxonomy'] ?? CYN_VIDEO_CATEGORY_TAXONOMY;



if ( empty( $related ) ) {
	$query_args = [ 
		'post_type' => $post_type,
		'posts_per_page' => 4,
		'post__not_in' => [ get_the_ID() ],
		'fields' => 'ids',
	];
	$terms_obj = get_the_terms( get_the_ID(), $taxonomy );
	$terms = [];

	if ( $terms_obj ) {
		foreach ( $terms_obj as $term ) {
			array_push( $terms, $term->term_id );
		}

		$query_args['tax_query'] = [ 
			[ 
				'taxonomy' => $taxonomy,
				'field' => 'term_id',
				'terms' => $terms
			]
		];
	}




	$related = get_posts( $query_args );
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
				<div class="min-w-80">
					<?php cyn_get_card( 'general', [ 'post-id' => $post, 'post-type' => $post_type, 'is_responsive' => false ] ) ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>