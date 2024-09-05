<?php
$index = $args['index'];

$is_active = get_field( "is_active_$index" );


if ( ! $is_active )
	return;



$desktop_banner = get_field( "desktop_banner_$index" );
$mobile_banner = get_field( "mobile_banner_$index" );
$link = get_field( "link_$index" );
$post_type = get_field( "post_type_$index" );
$selected_posts = get_field( "posts_$index" );
$id = get_field( "id_$index" );
$title = get_field( "title_$index" );
$subtitle = get_field( "subtitle_$index" );
$description = get_field( "description_$index" );

$label = '';

if ( $post_type === CYN_VIDEO_POST_TYPE ) {
	$label = 'ویدئو ها';
}

if ( $post_type === 'product' ) {
	$label = 'دوره ها';
}

if ( $post_type === CYN_PODCAST_POST_TYPE ) {
	$label = 'پادکست ها';
}

$query = new WP_Query( [ 
	'post_type' => $post_type,
	'posts_per_page' => 4,
	'posts__in' => $selected_posts,
] );
?>


<div id="<?php echo $id ?>"
	 class="container "
	 style="
	 --bg-desktop-url: url('<?php echo wp_get_attachment_image_url( $desktop_banner, 'full', false ) ?>'); 
	 --bg-mobile-url: url('<?php echo wp_get_attachment_image_url( $mobile_banner, 'full', false ) ?>'); 
	 ">

	<div
		 class="bg-[image:var(--bg-mobile-url)] md:bg-[image:var(--bg-desktop-url)] bg-no-repeat bg-cover px-6 py-12 grid gap-4 rounded-2xl after:absolute after:inset-0 after:bg-gradient-to-l after:from-black after:from-30% after:to-transparent after:rounded-[inherit] relative after:opacity-50 after:-z-10 isolate">

		<div class="text-3xl">
			<?php echo $title ?>
		</div>

		<div class="text-xl text-white/65">
			<?php echo $subtitle ?>
		</div>

		<div class="text-white/65 max-w-[65ch] leading-loose">
			<?php echo $description ?>
		</div>

	</div>

	<div class="my-4">
		<div class="flex justify-between">
			<div class="text-2xl">
				<?php echo $label ?>
			</div>


			<a href="<?php echo $link ?>"
			   class="px-4 py-2 bg-white/15 rounded-full hover:bg-white/25 transition-colors">
				<?php _e( 'مشاهده همه', 'cyn-dm' ) ?>
			</a>

		</div>

		<div class="flex gap-2 overflow-auto mt-3">
			<?php
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<div class="">
						<?php cyn_get_card( $post_type, [ 'is_responsive' => false ] ); ?>
					</div>
					<?php
				endwhile;
			endif;
			wp_reset_postdata();
			?>
		</div>
	</div>
</div>