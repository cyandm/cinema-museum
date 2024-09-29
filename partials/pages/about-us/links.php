<?php
if ( false == get_field( 'other_links_activate' ) ) {
	return;
}

?>

<div class="container grid gap-8">
	<div class="text-4xl text-center">
		<?php _e( 'دیگر لینک های ما', 'cyn-dm' ) ?>
	</div>

	<div class="flex flex-col md:flex-row items-center justify-center w-full gap-2">
		<?php for ( $i = 1; $i <= 3; $i++ ) :
			$link = get_field( "link_$i" );
			$link_text = get_field( "link_text_$i" );

			if ( empty( $link ) || empty( $link_text ) )
				continue;
			?>
			<div class="text-center w-full md:max-w-fit p-2 bg-white/10 rounded-md">
				<a href="<?php echo $link ?>"
				   class="text-blue-700 hover:text-blue-600">
					<?php echo $link_text ?>
				</a>
			</div>
		<?php endfor; ?>
	</div>
</div>