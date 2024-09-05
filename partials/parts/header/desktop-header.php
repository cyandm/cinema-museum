<?php
$desktop_menu = cyn_get_menu_items_by_slug( CYN_DESKTOP_HEADER );
$login_menu = cyn_get_menu_items_by_slug( CYN_LOGIN_MENU );
$is_login = is_user_logged_in();
?>

<div class="py-6 flex justify-between">
	<!--Right section-->
	<div class="flex gap-4 items-center">
		<?php foreach ( $desktop_menu as $index => $menu_item ) : ?>
			<div class="text-white/65 flex items-center gap-1 hover:text-white transition-colors group relative py-2">
				<a href="<?php echo $menu_item->url ?>">
					<?php echo $menu_item->title ?>
				</a>

				<?php echo $menu_item->child_items ? '<svg class="icon size-4 group-hover:rotate-180 transition-transform"><use href="#icon-chevron-down"/></svg>' : '' ?>

				<?php if ( $menu_item->child_items ) : ?>
					<div
						 class="border p-3 absolute top-10 right-0 bg-black min-w-52 border-red-900 opacity-0 translate-y-2 pointer-events-none group-hover:translate-y-0 group-hover:opacity-100 group-hover:pointer-events-auto z-10 transition-all flex flex-col gap-2 rounded-lg">
						<?php foreach ( $menu_item->child_items as $index => $child ) : ?>
							<a href="<?php echo $child->url ?>"
							   class="bg-stone-800 hover:bg-stone-700 block p-2 rounded-md text-white/65 hover:text-white transition-colors">
								<?php echo $child->title ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>

	<!--Left section-->
	<div class="flex gap-2">
		<form action="<?php echo get_site_url() ?>">
			<div class="flex items-center bg-stone-900 px-4 py-2 rounded-full">
				<svg class="icon">
					<use href="#icon-search-loupe" />
				</svg>

				<input type="text"
					   name="s"
					   value="<?php the_search_query() ?>"
					   class="bg-transparent text-white border-none focus:ring-0"
					   placeholder="<?php _e( 'جستجو کنید', 'cyn-dm' ) ?>"
					   class="border-none">

				<input type="hidden"
					   name="search-type"
					   value="<?php echo CYN_VIDEO_POST_TYPE ?>">
			</div>
		</form>

		<div class="primary-btn flex gap-2 group relative">
			<a href="#">
				<?php $is_login ? _e( 'حساب کاربری', 'cyn-dm' ) : _e( 'ورود / ثبت نام', 'cyn-dm' ) ?>
			</a>
			<?php echo $is_login ? '<svg class="icon size-4 group-hover:rotate-180 transition-transform"><use href="#icon-chevron-down"/></svg>' : '' ?>

			<?php if ( $is_login ) : ?>
				<div
					 class="border p-3 absolute top-14 right-0 bg-black min-w-52 border-red-900 opacity-0 translate-y-2 pointer-events-none group-hover:translate-y-0 group-hover:opacity-100 group-hover:pointer-events-auto z-10 transition-all flex flex-col gap-2 rounded-lg">
					<?php foreach ( $login_menu as $index => $menu ) : ?>
						<a href="<?php echo $menu->url ?>"
						   class="bg-stone-800 hover:bg-stone-700 block p-2 rounded-md text-white/65 hover:text-white transition-colors">
							<?php echo $menu->title ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>