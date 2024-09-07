<footer class="mt-6 bg-no-repeat bg-[left_16px_top_0] max-md:!bg-none after:bg-black/35 after:content-[''] after:inset-0 after:absolute relative isolate after:-z-10"
		style="background-image: url('<?php echo get_option( 'footer_bg_image' ) ?>');">
	<div class="py-11 px-5 grid gap-10">
		<?php cyn_get_part( '/footer/items' ) ?>

		<?php cyn_get_part( '/footer/social-media' ) ?>
	</div>
</footer>