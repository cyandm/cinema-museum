<?php

class cyn_woocommerce {

	public function __construct() {

		add_action( 'init', [ $this, 'remove_actions' ] );
		add_action( 'init', [ $this, 'change_woocommerce_positions' ] );

		add_action( 'woocommerce_breadcrumb_defaults', [ $this, 'customize_breadcrumb' ], 10 );
		add_action( 'woocommerce_product_loop_title_classes', [ $this, 'change_loop_title_classes' ] );


	}


	public function remove_actions() {

		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );


	}

	public function customize_breadcrumb( $args ) {
		$args = [ 
			'delimiter' => '<svg class="icon"><use href="#icon-Left,-Arrow"/></svg>',
			'wrap_before' => '<nav class="woocommerce-breadcrumb [&_a]:text-white/65 overflow-auto [&_a:hover]:text-white [&_a]:transition-colors flex items-center gap-2 py-4 [&_a]:min-w-fit [&_.last]:min-w-fit" aria-label="Breadcrumb">',
			'wrap_after' => '</nav>',
			'before' => '',
			'after' => '',
			'home' => _x( 'Home', 'breadcrumb', 'woocommerce' ),
		];

		return $args;
	}

	public function change_woocommerce_positions() {
		add_action( 'woocommerce_single_product_summary', [ $this, 'cyn_template_single_time' ], 10 );
		add_action( 'woocommerce_single_product_summary', [ $this, 'cyn_template_single_custom_acf' ], 25 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 28 );

		add_action( 'cyn_add_to_cart', 'woocommerce_template_loop_add_to_cart' );
		add_action( 'woocommerce_before_shop_loop_item_title', [ $this, 'cyn_template_loop_episodes' ] );
	}

	public function cyn_template_single_time() {
		wc_get_template( 'single-product/time.php' );
	}

	public function cyn_template_single_custom_acf() {
		wc_get_template( 'single-product/custom-acf.php' );
	}

	public function cyn_template_loop_episodes() {
		wc_get_template( 'loop/episodes.php' );

	}

	public function change_loop_title_classes() {
		return 'text-2xl';
	}
}