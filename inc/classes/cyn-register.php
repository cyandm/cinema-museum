<?php

if ( ! class_exists( 'cyn_register' ) ) {
	class cyn_register {
		function __construct() {
			add_action( 'init', [ $this, 'cyn_post_type_register' ] );
			add_action( 'init', [ $this, 'cyn_taxonomy_register' ] );
			add_action( 'init', [ $this, 'cyn_term_register' ] );
			add_action( 'init', [ $this, 'cyn_page_register' ] );

			add_action( 'after_setup_theme', [ $this, 'cyn_register_menus' ] );
		}

		public function cyn_register_menus() {

			register_nav_menus( [ 
				CYN_DESKTOP_HEADER => "منوی سربرگ",
				CYN_LOGIN_MENU => "منوی حساب کاربری",
				CYN_MOBILE_MENU => "منوی موبایل",
				CYN_FOOTER_1 => 'ستون اول فوتر',
				CYN_FOOTER_2 => 'ستون دوم فوتر',
				CYN_HOMEPAGE_SIDEBAR => 'منوی ساید بار صفحه اصلی'
			] );
		}

		public function cyn_post_type_register() {
			$this->cyn_make_post_type( CYN_VIDEO_POST_TYPE, 'ویدئو', 'ویدئوها', 'dashicons-video-alt3', [ 'title', 'thumbnail', 'editor' ] );
			$this->cyn_make_post_type( CYN_PODCAST_POST_TYPE, 'پادکست', 'پادکست ها', 'dashicons-format-audio', [ 'title', 'thumbnail', 'editor' ] );
			$this->cyn_make_post_type( CYN_EMPLOYER_POST_TYPE, 'همکار', 'همکاران', 'dashicons-admin-users', [ 'title' ], false );
			$this->cyn_make_post_type( CYN_IMAGE_POST_TYPE, 'تصویر', 'تصاویر', 'dashicons-format-image', [ 'title', 'thumbnail' ] );
			$this->cyn_make_post_type( CYN_FORM_POST_TYPE, 'فرم', 'فرم ها', 'dashicons-format-chat', [ 'title' ], false );
		}

		public function cyn_taxonomy_register() {
			$this->cyn_make_taxonomy( CYN_VIDEO_CATEGORY_TAXONOMY, ' دسته بندی', 'دسته بندی های ویدئو', [ CYN_VIDEO_POST_TYPE ] );
			$this->cyn_make_taxonomy( CYN_EMPLOYER_CATEGORY_TAXONOMY, 'دسته بندی ', 'دسته بندی های همکاران', [ CYN_EMPLOYER_POST_TYPE ] );
			$this->cyn_make_taxonomy( CYN_IMAGE_CATEGORY_TAXONOMY, 'دسته بندی ', 'دسته بندی های تصاویر', [ CYN_IMAGE_POST_TYPE ] );
		}

		public function cyn_term_register() {
			//This terms can't be removed


			// wp_insert_term( 'name', 'taxonomy', [ 'slug' => 'slug' ] );
		}

		public function cyn_page_register() {
			//This pages can't be removed

			if ( is_null( get_page_by_path( CYN_ABOUT_US_PAGE ) ) ) {
				wp_insert_post( [ 
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_title' => 'درباره ما',
					'post_name' => CYN_ABOUT_US_PAGE,
					'page_template' => 'templates/' . CYN_ABOUT_US_PAGE . '.php'
				] );
			}

			if ( is_null( get_page_by_path( CYN_CONTACT_US_PAGE ) ) ) {
				wp_insert_post( [ 
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_title' => 'تماس با ما',
					'post_name' => CYN_CONTACT_US_PAGE,
					'page_template' => 'templates/' . CYN_CONTACT_US_PAGE . '.php'
				] );
			}

			if ( is_null( get_page_by_path( CYN_FRONT_PAGE ) ) ) {
				$front_page_id = wp_insert_post( [ 
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_title' => 'صفحه اصلی',
					'post_name' => CYN_FRONT_PAGE,
					'page_template' => 'templates/' . CYN_FRONT_PAGE . '.php'
				] );

				update_option( 'show_on_front', 'page' );
				update_option( 'page_on_front', $front_page_id );
			}

		}

		/**
		 * Summary of cyn_make_post_type
		 * @param string $slug from Globals that defined in cyn-global.php
		 * @param string $singular_name 
		 * @param string $plural_name
		 * @param string $icon
		 * @param string[] $supports 
		 * @return void
		 */
		private function cyn_make_post_type( $slug, $singular_name, $plural_name, $icon, $supports = [ 'title', 'thumbnail' ], $search_include = true ) {
			$labels = [ 
				'name' => $singular_name,
				'singular_name' => $singular_name,
				'menu_name' => $plural_name,
				'name_admin_bar' => $singular_name,
				'add_new' => 'افزودن ' . $singular_name,
				'add_new_item' => 'افزودن ' . $singular_name . ' جدید',
				'new_item' => $singular_name . ' جدید',
				'edit_item' => 'ویرایش ' . $singular_name,
				'view_item' => 'دیدن ' . $singular_name,
				'all_items' => 'همه ' . $plural_name,
				'search_items' => 'جستجو ' . $singular_name,
				'not_found' => $singular_name . '‌ای پیدا نشد',
				'not_found_in_trash' => $singular_name . ' پیدا نشد'
			];

			$args = [ 
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'query_var' => true,
				'rewrite' => [ 'slug' => $slug ],
				'exclude_from_search' => ! $search_include,
				'has_archive' => true,
				'hierarchical' => false,
				'menu_position' => null,
				'menu_icon' => $icon,
				'supports' => $supports,

			];

			register_post_type( $slug, $args );
		}

		/**
		 * Summary of cyn_make_taxonomy
		 * @param string $slug from Globals that defined in cyn-global.php
		 * @param string $singular_name
		 * @param string $plural_name
		 * @param string[] $post_types 
		 * @param boolean $is_hierarchical
		 * @return void
		 */
		private function cyn_make_taxonomy( $slug, $singular_name, $plural_name, $post_types, $is_hierarchical = true ) {

			$args = [ 
				'labels' => [ 
					'name' => $plural_name,
					'menu_name' => $plural_name,
					'all_items' => 'همه ' . $plural_name,
					'add_new_item' => 'افزودن ' . $singular_name . 'جدید ',
				],
				'hierarchical' => $is_hierarchical,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
				'query_var' => true,
				'rewrite' => [ 'slug' => $slug ],
			];

			register_taxonomy( $slug, $post_types, $args );
		}
	}
}