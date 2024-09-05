<div class="flex justify-center items-center gap-2">
	<?php for ( $i = 1; $i < 11; $i++ ) :
		if ( empty( get_option( "social_media_img_$i" ) ) )
			continue;
		?>
		<a href="<?php echo get_option( "social_media_link_$i", '#' ) ?>"
		   class="p-1 hover:brightness-125 brightness-75 transition-all duration-300">
			<img src="<?php echo get_option( "social_media_img_$i", '#' ) ?>">
		</a>
	<?php endfor; ?>
</div>