<?php /*Template Name: صفحه اصلی*/ ?>

<?php get_header( null, [ 'render_template' => false ] ) ?>

<div class="flex">

	<div class="hidden lg:block">
		<?php cyn_get_part( '/sidebar/home' ) ?>
	</div>

	<div class="w-full">
		<?php
		cyn_get_part( '/header/template' );

		cyn_get_page( '/front/section', [ 'index' => 'familiar_meeting' ] );

		for ( $i = 1; $i <= 10; $i++ ) {
			cyn_get_page( '/front/section', [ 'index' => $i ] );
		}

		cyn_get_part( '/footer/template' );
		?>
	</div>
</div>

<?php get_footer( null, [ 'render_template' => false ] ) ?>