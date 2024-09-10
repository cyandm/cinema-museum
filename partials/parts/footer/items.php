<?php
$footer_col_1 = cyn_get_menu_items_by_slug( CYN_FOOTER_1 ) ?? [];
$footer_col_2 = cyn_get_menu_items_by_slug( CYN_FOOTER_2 ) ?? [];

?>

<div class="grid grid-cols-5 container">

	<div class="col-span-5 md:col-span-3 flex flex-col md:flex-row  gap-6 md:gap-14">
		<!--column 1-->
		<div class="flex flex-col gap-4">
			<span class="text-white font-semibold">
				<?php echo get_option( 'footer_column_1_title' ) ?>
			</span>

			<div class="grid gap-3">
				<?php foreach ( $footer_col_1 as $index => $menu_item ) : ?>

					<a href="<?php echo $menu_item->url ?>"
					   class="text-white/65 hover:text-white transition-colors">
						<?php echo $menu_item->title ?>
					</a>
				<?php endforeach; ?>
			</div>
		</div>

		<!--column 2-->
		<div class="flex flex-col gap-4">

			<span class="text-white font-semibold">
				<?php echo get_option( 'footer_column_2_title' ) ?>
			</span>

			<div class="grid gap-3">
				<?php foreach ( $footer_col_2 as $index => $menu_item ) : ?>
					<a href="<?php echo $menu_item->url ?>"
					   class="text-white/65 hover:text-white transition-colors">
						<?php echo $menu_item->title ?>
					</a>
				<?php endforeach; ?>
			</div>

		</div>

		<!--column 3-->
		<div class="flex flex-col gap-4">
			<span class="text-white font-semibold">
				<?php echo get_option( 'footer_column_3_title', __( 'شماره تماس', 'cyn-dm' ) ) ?>
			</span>

			<a href="<?php echo get_option( 'footer_column_3_link', 'tel:02122705005' ) ?>"
			   class="text-blue-600 hover:text-blue-500 transition-colors">
				<?php echo get_option( 'footer_column_3_text', '(021)-22705005-9' ) ?>
			</a>
		</div>

		<!--column 4-->
		<div class="flex flex-col gap-4">
			<span class="text-white font-semibold">
				<?php echo get_option( 'footer_column_4_title', __( 'آدرس', 'cyn-dm' ) ) ?>
			</span>

			<span class="md:max-w-[36ch] text-white/65">
				<?php echo get_option( 'footer_column_4_text', __( 'تهران، خیابان ولیعصر ،نرسیده به میدان تجریش، باغ فردوس', 'cyn-dm' ) ) ?>
			</span>
		</div>
	</div>

	<div class="col-span-5 md:col-span-2 md:pl-28 max-md:mt-6  ">
		<div
			 class="h-full w-full [&_iframe]:w-full [&_iframe]:h-full [&_iframe]:rounded-lg [&_iframe]:grayscale [&_iframe]:hover:grayscale-0 [&_iframe]:transition-all">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25917.138252585497!2d51.420469700000005!3d35.7104195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e03d6294b64b9%3A0xa346921d370e2c4b!2sSajjad%20Hospital!5e0!3m2!1sen!2s!4v1725970020454!5m2!1sen!2s"
					width="600"
					height="450"
					style="border:0;"
					allowfullscreen=""
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
</div>