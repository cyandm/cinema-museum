<?php
$footer_col_1 = cyn_get_menu_items_by_slug( CYN_FOOTER_1 ) ?? [];
$footer_col_2 = cyn_get_menu_items_by_slug( CYN_FOOTER_2 ) ?? [];

?>

<div class="flex gap-6 md:gap-14 container flex-col md:flex-row">

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
			<?php echo get_option( 'footer_column_3_title', __( 'آدرس', 'cyn-dm' ) ) ?>
		</span>

		<span class="md:max-w-[36ch] text-white/65">
			<?php echo get_option( 'footer_column_3_text', __( 'تهران، خیابان ولیعصر ،نرسیده به میدان تجریش، باغ فردوس', 'cyn-dm' ) ) ?>
		</span>
	</div>


	<!--column 4-->
	<div class="flex flex-col gap-4">
		<span class="text-white font-semibold">
			<?php echo get_option( 'footer_column_4_title', __( 'شماره تماس', 'cyn-dm' ) ) ?>
		</span>

		<a href="<?php echo get_option( 'footer_column_4_link', 'tel:02122705005' ) ?>"
		   class="text-blue-600 hover:text-blue-500 transition-colors">
			<?php echo get_option( 'footer_column_4_text', '(021)-22705005-9' ) ?>
		</a>
	</div>
</div>