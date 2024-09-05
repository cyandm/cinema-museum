<?php
class cyn_meta {
	function __construct() {
		add_action( 'add_meta_boxes', [ $this, 'add_form_meta_box' ] );

		add_filter( 'manage_' . CYN_FORM_POST_TYPE . '_posts_columns', [ $this, 'form_table_head' ] );
		add_filter( 'manage_' . CYN_FORM_POST_TYPE . '_posts_custom_column', [ $this, 'form_table_column' ], 10, 2 );

	}

	public function add_form_meta_box() {
		global $post;
		if ( $post->post_type !== CYN_FORM_POST_TYPE )
			return;


		add_meta_box( 'form_information', 'اطلاعات فرم', function () {
			$meta_group = [ 
				[ 
					'name' => '_name',
					'label' => 'نام',
				],
				[ 
					'name' => '_email',
					'label' => 'ایمیل',
				],
				[ 
					'name' => '_tel',
					'label' => 'تلفن',
				],
				[ 
					'name' => '_message',
					'label' => 'پیام',
				],
			];

			cyn_get_component( '/metabox', [ 'meta_group' => $meta_group ] );
		}, null, 'advanced', 'high' );
	}

	public function form_table_head( $columns ) {
		$columns['phone'] = __( 'شماره تلفن', 'cyn-dm' );
		$columns['email'] = __( 'آدرس ایمیل', 'cyn-dm' );
		return $columns;
	}

	public function form_table_column( $column_name, $post_id ) {
		if ( $column_name == 'phone' ) {

			echo get_post_meta( $post_id, '_tel', true );
		}

		if ( $column_name == 'email' ) {
			echo get_post_meta( $post_id, '_email', true );
		}
	}
}