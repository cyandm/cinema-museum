<?php
$mobile_menu = cyn_get_menu_items_by_slug( CYN_MOBILE_MENU );
?>

<div id="mobileMenu"
	 class="fixed space-y-4 inset-0 max-w-xs bg-stone-950 border border-red-900 z-50 transition-all duration-300 [clip-path:polygon(100%_0%_,100%_0_,100%_100%,_100%_100%)] py-4 px-4 overflow-y-auto h-screen">


	<div class="flex justify-between items-center">
		<div id="mobileMenuCloser"
			 class="rounded-full bg-stone-800 p-2">
			<svg class="icon">
				<use href="#icon-xmark" />
			</svg>
		</div>

		<div class="flex items-center gap-1">
			<?php the_custom_logo() ?>
			<span>
				<?php echo get_option( 'blogname', 'سینماتو' ) ?>
			</span>
		</div>

	</div>


	<div class="grid gap-2">
		<?php foreach ( $mobile_menu as $index => $menu_item ) : ?>
			<div class="group">
				<a href="<?php echo $menu_item->url ?>"
				   class="flex justify-between items-center p-2 rounded-md bg-stone-950 text-white/65 hover:text-white hover:bg-stone-900">
					<?php echo $menu_item->title ?>
					<?php echo $menu_item->child_items ? '<svg class="icon size-4 group-hover:rotate-180 transition-transform"><use href="#icon-chevron-down"/></svg>' : '' ?>
				</a>

				<?php if ( $menu_item->child_items ) : ?>
					<div class="grid transition-all grid-rows-[0fr] group-hover:grid-rows-[1fr] bg-stone-900">
						<div class="overflow-hidden grid gap-2">
							<?php foreach ( $menu_item->child_items as $index => $child ) : ?>
								<a class="bg-stone-800 text-white/65 hover:text-white hover:bg-stone-700 p-2 rounded-md block"
								   href="<?php echo $child->url ?>"><?php echo $child->title ?></a>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>

			</div>


		<?php endforeach; ?>
	</div>

</div>