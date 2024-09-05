<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<a href="<?php echo get_permalink() ?>"
   <?php wc_product_class( 'group', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10 @remove_by_cyn
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	?>
	<div class="min-h-80 min-w-80 bg-no-repeat bg-cover rounded-2xl flex items-end p-4 relative after:content-[''] after:absolute after:inset-0 after:bg-gradient-to-t after:from-black after:from-30% after:to-transparent after:opacity-50 after:-z-10 isolate group-hover:after:opacity-30 after:transition-all after:duration-300"
		 style="background-image: url('<?php echo get_the_post_thumbnail_url( $product->get_id() ) ?>');">
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10 @remove_by_cyn
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		<div class="flex flex-col gap-2 md:flex-row w-full justify-between">
			<div class="space-y-2">
				<?php
				/**
				 * Hook: woocommerce_shop_loop_item_title.
				 *
				 * @hooked woocommerce_template_loop_product_title - 10
				 */
				do_action( 'woocommerce_shop_loop_item_title' );

				/**
				 * Hook: woocommerce_after_shop_loop_item_title.
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
				?>
			</div>

			<div>
				<?php
				/**
				 * Hook:cyn_add_to_cart
				 * 
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */

				do_action( 'cyn_add_to_cart' );
				?>
			</div>

		</div>

	</div>
	<?php
	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5 @remove_by_cyn
	 * @hooked woocommerce_template_loop_add_to_cart - 10 @remove_by_cyn
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</a>