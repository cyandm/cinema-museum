<?php
global $post;
$meta_group = $args['meta_group'] ?? [];


?>

<table id="form-metabox">
	<?php foreach ( $meta_group as $index => $meta_item ) :
		$value = get_post_meta( $post->ID, $meta_item['name'], true );
		if ( $value ) : ?>

			<tr>
				<td colspan="6"><?= $meta_item['label'] ?></td>
				<td colspan="6"><?= get_post_meta( $post->ID, $meta_item['name'], true ) ?></td>
			</tr>

		<?php endif;
	endforeach; ?>
</table>