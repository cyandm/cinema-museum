<?php
global $wp_query;
$is_searched = ! empty( $_GET['s'] );

$inputs = [ 
	[ 
		'post_type' => CYN_VIDEO_POST_TYPE,
		'label' => __( 'ویدئوها', 'cyn-dm' )
	],
	[ 
		'post_type' => CYN_PODCAST_POST_TYPE,
		'label' => __( 'پادکست ها', 'cyn-dm' )
	],
];

?>

<div class="bg-white/15 backdrop-filter backdrop-blur-2xl p-4">
	<form action=""
		  id="searchPageForm">
		<div class="container flex flex-col gap-8 md:flex-row items-center">

			<div class="flex-1 justify-start">
				<div class="flex items-center bg-stone-900 px-4 py-2 rounded-full max-w-fit">
					<button type="submit">
						<svg class="icon">
							<use href="#icon-search-loupe" />
						</svg>
					</button>

					<input type="text"
						   name="s"
						   value="<?php the_search_query() ?>"
						   class="bg-transparent text-white border-none focus:ring-0"
						   placeholder="<?php _e( 'جستجو کنید', 'cyn-dm' ) ?>"
						   class="border-none">
				</div>
			</div>


			<div class="flex-1 flex gap-2 <?php echo $is_searched ? 'justify-center' : 'justify-end' ?> ">
				<div>
					<?php _e( 'جستجو در: ', 'cyn-dm' ) ?>
				</div>

				<div class="flex gap-2">
					<?php foreach ( $inputs as $index => $input ) : ?>
						<label for="<?php echo $input['post_type'] ?>"
							   class="cursor-pointer">
							<input type="radio"
								   class="text-red-600 focus:ring-red-600 cursor-pointer"
								   value="<?php echo $input['post_type'] ?>"
								   name="search-type"
							   	<?php echo $_GET['search-type'] === $input['post_type'] ? 'checked' : '' ?>
								   id="<?php echo $input['post_type'] ?>" />

							<?php echo $input['label'] ?>
						</label>
					<?php endforeach; ?>
				</div>
			</div>

			<?php if ( $is_searched ) : ?>
				<div class="flex-1 flex justify-end">
					<span>
						<?php echo $wp_query->found_posts . __( 'نتیجه', 'cyn-dm' ) ?>
					</span>
				</div>
			<?php endif; ?>
		</div>
	</form>
</div>