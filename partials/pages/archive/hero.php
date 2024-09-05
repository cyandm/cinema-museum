<?php
$field_name = $args['field_name'] ?? '';
?>

<?php if ( ! empty( get_option( $field_name ) ) ) : ?>
	<div class="w-full container ">
		<img src="<?php echo get_option( $field_name, '#' ) ?>"
			 class="object-cover w-full rounded-2xl">
	</div>
<?php endif; ?>