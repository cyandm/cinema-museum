<?php $home_page_sidebar_menu = cyn_get_menu_items_by_slug( CYN_HOMEPAGE_SIDEBAR ) ?>

<div class="min-w-56">
	<div class="fixed min-w-56 bg-white/10 backdrop-blur-lg right-0 h-full px-5 z-30">
		<div class="flex flex-col items-center gap-2 justify-center py-3">
			<div>
				<?php the_custom_logo() ?>
			</div>

			<div>
				<?php echo get_option( 'blogname' ) ?>
			</div>

			<div class="text-white/65">
				<?php echo get_option( 'slogan' ) ?>
			</div>
		</div>

		<div class="grid gap-4 mt-4">
			<?php foreach ( $home_page_sidebar_menu as $index => $menu_item ) : ?>
				<a href="<?php echo $menu_item->url ?>"
				   class="p-4 flex gap-1 bg-gradient-to-b from-white/15 to-stone-700/15 group transition-colors hover:from-red-800 hover:to-red-950/30 rounded-2xl items-center">
					<div class="size-6">
						<?php echo wp_get_attachment_image( get_field( 'icon', $menu_item->ID ), 'full' ) ?>
					</div>
					<div>
						<?php echo $menu_item->title ?>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</div>