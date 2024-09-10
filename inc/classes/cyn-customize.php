<?php

if ( ! class_exists( 'cyn_customize' ) ) {
	class cyn_customize {
		function __construct() {
			add_action( 'customize_register', [ $this, 'cyn_basic_settings' ] );
		}

		public function cyn_basic_settings( $wp_customize ) {

			$this->cyn_add_to_title_tagline_panel( $wp_customize );
			$this->cyn_register_panel_general( $wp_customize );
			$this->cyn_register_panel_footer( $wp_customize );
			$this->cyn_register_panel_archive( $wp_customize );
			$this->cyn_register_panel_custom_code( $wp_customize );


		}

		/**
		 * Summary of cyn_add_control
		 * @param mixed $wp_customize
		 * @param string $section name of section that this control related to
		 * @param string $type 'text' | 'textarea' | 'tel' | 'image' | 'file'
		 * @param string $id name that saved on wp_option table on database
		 * @param string $label 
		 * @param string $description
		 * @return void
		 */
		private function cyn_add_control( $wp_customize, $section, $type, $id, $label, $description = '' ) {
			$wp_customize->add_setting(
				$id,
				[ 'type' => 'option' ]
			);


			if ( $type == "file" ) {
				$wp_customize->add_control(
					new WP_Customize_Upload_Control(
						$wp_customize,
						$id,
						[ 
							'label' => $label,
							'section' => $section,
							'settings' => $id,
							'description' => $description,
						]
					)
				);
			}

			if ( $type != 'file' ) {
				$wp_customize->add_control(
					$id,
					[ 
						'label' => $label,
						'section' => $section,
						'settings' => $id,
						'type' => $type,
						'description' => $description,
					]
				);
			}
		}

		private function cyn_register_panel_general( $wp_customize ) {

			$wp_customize->add_panel(
				'general',
				[ 
					'title' => 'تنظیمات عمومی',
					'priority' => 1
				]
			);


			$wp_customize->add_section(
				'body',
				[ 
					'title' => 'تنظیمات بادی',
					'priority' => 1,
					'panel' => 'general'
				]
			);


			$this->cyn_add_control( $wp_customize, 'body', 'file', 'body_bg', 'بکگراند بادی' );

			$wp_customize->add_section(
				'page_404',
				[ 
					'title' => 'تنظیمات 404',
					'priority' => 1,
					'panel' => 'general'
				]
			);

			$this->cyn_add_control( $wp_customize, 'page_404', 'file', 'img_404', 'تصویر 404' );

			$wp_customize->add_section(
				'page_search',
				[ 
					'title' => 'تنظیمات search',
					'priority' => 1,
					'panel' => 'general'
				]
			);

			$this->cyn_add_control( $wp_customize, 'page_search', 'file', 'img_search', 'تصویر search' );

			$wp_customize->add_section(
				'page_preloader',
				[ 
					'title' => 'تنظیمات preloader',
					'priority' => 1,
					'panel' => 'general'
				]
			);

			$this->cyn_add_control( $wp_customize, 'page_preloader', 'file', 'img_preloader', 'تصویر preloader' );

		}

		private function cyn_add_to_title_tagline_panel( $wp_customize ) {

			$this->cyn_add_control( $wp_customize, 'title_tagline', 'text', 'slogan', 'شعار', 'نمایش در منوی موبایل' );
		}

		private function cyn_register_panel_footer( $wp_customize ) {
			$wp_customize->add_panel(
				'footer',
				[ 
					'title' => 'تنظیمات فوتر',
					'priority' => 1
				]
			);

			$wp_customize->add_section(
				'footer_general',
				[ 
					'title' => 'تنظیمات عمومی',
					'priority' => 1,
					'panel' => 'footer'
				]
			);

			$this->cyn_add_control( $wp_customize, 'footer_general', 'file', 'footer_bg_image', 'تصویر پس زمینه' );


			$wp_customize->add_section(
				'footer_col_1',
				[ 
					'title' => 'تنظیمات ستون 1',
					'priority' => 1,
					'panel' => 'footer'
				]
			);

			$this->cyn_add_control( $wp_customize, 'footer_col_1', 'text', 'footer_column_1_title', 'عنوان' );

			$wp_customize->add_section(
				'footer_col_2',
				[ 
					'title' => 'تنظیمات ستون 2',
					'priority' => 1,
					'panel' => 'footer'
				]
			);

			$this->cyn_add_control( $wp_customize, 'footer_col_2', 'text', 'footer_column_2_title', 'عنوان' );






			$wp_customize->add_section(
				'footer_col_3',
				[ 
					'title' => 'تنظیمات ستون 3',
					'priority' => 1,
					'panel' => 'footer'
				]
			);

			$this->cyn_add_control( $wp_customize, 'footer_col_3', 'text', 'footer_column_3_title', 'عنوان', 'پیش فرض: شماره تماس' );
			$this->cyn_add_control( $wp_customize, 'footer_col_3', 'text', 'footer_column_3_link', 'لینک', 'پیش فرض:لینک شماره تماس' );
			$this->cyn_add_control( $wp_customize, 'footer_col_3', 'text', 'footer_column_3_text', 'متن', 'پیش فرض:متن شماره تماس' );


			$wp_customize->add_section(
				'footer_col_4',
				[ 
					'title' => 'تنظیمات ستون 4',
					'priority' => 1,
					'panel' => 'footer'
				]
			);

			$this->cyn_add_control( $wp_customize, 'footer_col_4', 'text', 'footer_column_4_title', 'عنوان', 'پیش فرض: آدرس' );
			$this->cyn_add_control( $wp_customize, 'footer_col_4', 'text', 'footer_column_4_text', 'متن', 'پیش فرض: آدرس' );


			$wp_customize->add_section(
				'social_media',
				[ 
					'title' => 'شبکه های اجتماعی',
					'priority' => 1,
					'panel' => 'footer'
				]
			);

			for ( $i = 1; $i < 11; $i++ ) {
				$this->cyn_add_control( $wp_customize, 'social_media', 'file', "social_media_img_$i", "تصویر شبکه اجتماعی $i" );
				$this->cyn_add_control( $wp_customize, 'social_media', 'text', "social_media_link_$i", "لینک شبکه اجتماعی $i" );
			}

			$wp_customize->add_section(
				'map',
				[ 
					'title' => 'نقشه',
					'priority' => 1,
					'panel' => 'footer'
				]
			);

			$this->cyn_add_control( $wp_customize, 'map', 'textarea', 'map_iframe', 'کد embed نقشه', 'کد را از گوگل مپ دریافت کنید' );



		}

		private function cyn_register_panel_archive( $wp_customize ) {
			$wp_customize->add_panel(
				'archive',
				[ 
					'title' => 'تنظیمات آرشیو',
					'priority' => 1
				]
			);


			$wp_customize->add_section(
				'archive_video',
				[ 
					'title' => 'تنظیمات صفحه آرشیو ویدئو',
					'priority' => 1,
					'panel' => 'archive'
				]
			);

			$this->cyn_add_control( $wp_customize, 'archive_video', 'file', 'archive_video_img', 'تصویر هیرو' );


			$wp_customize->add_section(
				'archive_podcast',
				[ 
					'title' => 'تنظیمات صفحه آرشیو پادکست',
					'priority' => 1,
					'panel' => 'archive'
				]
			);

			$this->cyn_add_control( $wp_customize, 'archive_podcast', 'file', 'archive_podcast_img', 'تصویر هیرو' );

			$wp_customize->add_section(
				'archive_employer',
				[ 
					'title' => 'تنظیمات صفحه آرشیو همکاران',
					'priority' => 1,
					'panel' => 'archive'
				]
			);

			$this->cyn_add_control( $wp_customize, 'archive_employer', 'file', 'archive_employer_img', 'تصویر هیرو' );

			$wp_customize->add_section(
				'archive_products',
				[ 
					'title' => 'تنظیمات صفحه آرشیو دوره ها',
					'priority' => 1,
					'panel' => 'archive'
				]
			);

			$this->cyn_add_control( $wp_customize, 'archive_products', 'file', 'archive_products_img', 'تصویر هیرو' );

		}

		private function cyn_register_panel_custom_code( $wp_customize ) {
			$wp_customize->add_panel(
				'custom_code',
				[ 
					'title' => 'تنظیمات کدهای سفارشی',
					'priority' => 1
				]
			);

			$wp_customize->add_section(
				'head_section',
				[ 
					'title' => 'داخل تگ head',
					'priority' => 1,
					'panel' => 'custom_code'
				]
			);


			for ( $i = 1; $i <= 10; $i++ ) {
				$this->cyn_add_control( $wp_customize, 'head_section', 'textarea', "cyn_head_code_$i", "کد سفارشی $i" );
			}

			$wp_customize->add_section(
				'start_body_section',
				[ 
					'title' => 'ابتدای تگ body',
					'priority' => 1,
					'panel' => 'custom_code'
				]
			);

			for ( $i = 1; $i <= 10; $i++ ) {
				$this->cyn_add_control( $wp_customize, 'start_body_section', 'textarea', "cyn_start_body_code_$i", "کد سفارشی $i" );
			}


			$wp_customize->add_section(
				'end_body_section',
				[ 
					'title' => 'انتهای تگ body',
					'priority' => 1,
					'panel' => 'custom_code'
				]
			);

			for ( $i = 1; $i <= 10; $i++ ) {
				$this->cyn_add_control( $wp_customize, 'end_body_section', 'textarea', "cyn_end_body_code_$i", "کد سفارشی $i" );
			}
		}
	}
}
