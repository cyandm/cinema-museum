<?php
$isVisitToday = isset( $_COOKIE['isVisitToday'] ) ? true : false;
?>


<?php if ( false === $isVisitToday ) : ?>
	<div class="fixed inset-0 bg-black z-50 flex justify-center items-center preloader">
		<div class="relative w-full h-full flex justify-center items-center">
			<div>
				<div class="logo absolute translate-x-[50%] -translate-y-[50%]">
					<?php the_custom_logo() ?>
				</div>

				<div class="preloader_image absolute translate-x-[50%] -translate-y-[50%] opacity-0">
					<img src="<?php echo get_option( 'img_preloader' ) ?>"
						 alt="">
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>