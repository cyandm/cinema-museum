<div class="container my-8">
	<span class="text-3xl"><?php _e( 'راه های ارتباطی', 'cyn-dm' ) ?></span>

	<div class="flex flex-col md:flex-row gap-4 md:gap-20 my-6">
		<div class="grid gap-4">
			<div class="text-2xl font-light">
				<?php echo get_option( 'footer_column_4_title', 'شماره تماس' ) ?>
			</div>

			<a href="<?php echo get_option( 'footer_column_4_link', 'tel:02122705005' ) ?>"
			   class="text-blue-600 hover:text-blue-500 transition-colors">
				<?php echo get_option( 'footer_column_4_text', '(021)-22705005-9' ) ?>
			</a>
		</div>

		<div class="grid gap-4">
			<div class="text-2xl font-light">
				<?php echo get_option( 'footer_column_3_title', __( 'آدرس', 'cyn-dm' ) ) ?>
			</div>

			<span class="text-zinc-300">
				<?php echo get_option( 'footer_column_3_text', __( 'تهران، خیابان ولیعصر ،نرسیده به میدان تجریش، باغ فردوس', 'cyn-dm' ) ) ?>
			</span>
		</div>

		<div class="grid gap-4">
			<div class="text-2xl font-light">
				<?php _e( 'شبکه های اجتماعی', 'cyn-dm' ) ?>
			</div>

			<?php cyn_get_part( 'footer/social-media' ) ?>
		</div>
	</div>
</div>