<div class="container">
	<div>
		<span class="block py-2 text-2xl">
			<?php echo $args['title'] ?? get_the_archive_title() ?>
		</span>
	</div>
	<div class="grid gap-3 grid-cols-1 sm:grid-cols-2  xl:grid-cols-3 2xl:grid-cols-4">
		<?php if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				cyn_get_card( $args['post-type'] );
			endwhile;
		endif; ?>
	</div>
</div>