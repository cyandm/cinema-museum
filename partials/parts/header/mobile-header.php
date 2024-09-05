<?php
$is_login = is_user_logged_in();
$login_menu = cyn_get_menu_items_by_slug( CYN_LOGIN_MENU );
?>

<div class="flex py-4 justify-between">
	<div>
		<div id="mobileMenuOpener"
			 class="rounded-full bg-stone-800 p-2">
			<svg class="icon -rotate-180">
				<use href="#icon-menu-burger-square" />
			</svg>
		</div>

		<?php cyn_get_part( '/header/mobile-menu' ) ?>
	</div>

	<div class="flex gap-2 items-center">
		<a href="<?php echo get_site_url( null, '/?s=' ) ?>"
		   class="rounded-full bg-stone-800 p-2">
			<svg class="icon">
				<use href="#icon-search-loupe" />
			</svg>
		</a>

		<div class="primary-btn flex gap-2 group relative">
			<a href="#">
				<?php $is_login ? _e( 'حساب کاربری', 'cyn-dm' ) : _e( 'ورود / ثبت نام', 'cyn-dm' ) ?>
			</a>

			<?php if ( $is_login ) : ?>
				<div
					 class="border p-3 absolute top-14 left-0 bg-black min-w-52 border-red-900 opacity-0 translate-y-2 pointer-events-none group-hover:translate-y-0 group-hover:opacity-100 group-hover:pointer-events-auto z-10 transition-all flex flex-col gap-2 rounded-lg">
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