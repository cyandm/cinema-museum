<?php

class cyn_rest {
	function __construct() {
		add_action( 'rest_api_init', [ $this, 'register_route' ] );
	}

	public function register_route() {
		register_rest_route(
			'cyn-api/v1',
			'/contact-form',
			[ 
				'methods' => 'POST',
				'callback' => [ $this, 'handle_contact_form' ],
				'permission_callback' => '__return_true'

			]
		);

		register_rest_route(
			'cyn-api/v1',
			'/popup-image',
			[ 
				'methods' => 'POST',
				'callback' => [ $this, 'handle_popup_image' ],
				'permission_callback' => '__return_true'

			]
		);

		register_rest_route(
			'cyn-api/v1',
			'/popup-video',
			[ 
				'methods' => 'POST',
				'callback' => [ $this, 'handle_popup_video' ],
				'permission_callback' => '__return_true'

			]
		);

		register_rest_route(
			'cyn-api/v1',
			'/popup-audio',
			[ 
				'methods' => 'POST',
				'callback' => [ $this, 'handle_popup_audio' ],
				'permission_callback' => '__return_true'

			]
		);
	}

	public function handle_contact_form( WP_REST_Request $request ) {

		$body = $request->get_body_params();

		$name = sanitize_text_field( $body['name'] );
		$email = sanitize_email( $body['email'] );
		$tel = sanitize_text_field( $body['tel'] );
		$message = sanitize_textarea_field( $body['message'] );

		$new_post = wp_insert_post( [ 
			'post_type' => CYN_FORM_POST_TYPE,
			'post_title' => $name,
			'post_status' => 'private',
			'meta_input' => [ 
				'_name' => $name,
				'_email' => $email,
				'_tel' => $tel,
				'_message' => $message,
			]
		] );

		if ( is_wp_error( $new_post ) ) {
			return new WP_REST_Response( 'something went wrong!', 500 );
		}

		return new WP_REST_Response( [ 'post-id' => $new_post ] );
	}

	public function handle_popup_image( WP_REST_Request $request ) {

		$res = new WP_REST_Response();
		$id = $request->get_body_params()['id'];

		ob_start();
		cyn_get_popup( 'image', [ 'post-id' => $id ] );
		$innerHTML = ob_get_clean();

		$res->set_data( [ 'innerHTML' => $innerHTML ] );
		return $res;
	}

	public function handle_popup_video( WP_REST_Request $request ) {

		$res = new WP_REST_Response();
		$id = $request->get_body_params()['id'];
		$acf_filed = $request->get_body_params()['acfField'];

		ob_start();
		cyn_get_popup( 'video', [ 'post-id' => $id, 'acf-field' => $acf_filed ] );
		$innerHTML = ob_get_clean();

		$res->set_data( [ 'innerHTML' => $innerHTML ] );
		return $res;
	}

	public function handle_popup_audio( WP_REST_Request $request ) {

		$res = new WP_REST_Response();
		$id = $request->get_body_params()['id'];

		ob_start();
		cyn_get_popup( 'audio', [ 'post-id' => $id ] );
		$innerHTML = ob_get_clean();

		$res->set_data( [ 'innerHTML' => $innerHTML ] );
		return $res;
	}
}