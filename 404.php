<?php get_header() ?>

<div class="container flex justify-center items-center h-full">
	<div class="h-full flex justify-center items-center flex-col space-y-4 my-24">
		<img src="<?php echo get_option( 'img_404' ) ?>"
			 alt="img 404">

		<div class="text-2xl">
			<?php _e( 'صفحه ی مورد نظر یافت نشد', 'cyn-dm' ) ?>
		</div>

		<div class="">
			<a href="<?php echo get_site_url() ?>"
			   class="primary-btn">
				<?php _e( 'بازگشت به صفحه اصلی', 'cyn-dm' ) ?>
			</a>
		</div>
	</div>
</div>

<?php get_footer() ?>