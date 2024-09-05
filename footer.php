<?php $render_template = $args['render_template'] ?? true ?>


</main>
<?php if ( $render_template ) : ?>
	<?php cyn_get_part( '/footer/template' ) ?>
<?php endif; ?>

<?php cyn_get_popup( 'backdrop' ); ?>

<div class="wp-scripts">
	<?php wp_footer() ?>
</div>

</body>

</html>