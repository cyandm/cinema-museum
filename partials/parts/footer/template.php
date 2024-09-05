<footer class="bg-no-repeat bg-[left_16px_top_0] max-md:!bg-none"
		style="background-image: url('<?php echo get_option( 'footer_bg_image' ) ?>');">
	<div class="py-11 px-5 grid gap-10">
		<?php cyn_get_part( '/footer/items' ) ?>

		<?php cyn_get_part( '/footer/social-media' ) ?>
	</div>
</footer>