<?php
add_action( 'acf/include_fields', 'cyn_register_acf' );

function cyn_register_acf() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}
	//post_types
	cyn_register_acf_video();
	cyn_register_acf_podcast();
	cyn_register_acf_employer();
	cyn_register_acf_image();
	cyn_register_acf_product();

	//taxonomies
	cyn_register_acf_taxonomies_pos();

	//page templates
	cyn_register_acf_about_us();
	cyn_register_acf_front();

	//menu items
	cyn_register_acf_menu();

}

function cyn_register_acf_video() {
	$fields = [ 
		cyn_acf_add_number( 'rate', 'امتیاز', 0, '', 'از 10' ),
		cyn_acf_add_text( 'duration', 'مدت زمان فیلم' ),
		cyn_acf_add_file( 'file', 'فایل مربوطه' ),
		cyn_acf_add_post_object( 'related_videos', 'ویدئوهای مرتبط', CYN_VIDEO_POST_TYPE ),
	];
	$location = [ 
		[ 
			[ 
				'param' => 'post_type',
				'operator' => '==',
				'value' => CYN_VIDEO_POST_TYPE
			],
		],
	];

	cyn_register_acf_group( 'تنظیمات ویدئو ها', $fields, $location );
}

function cyn_register_acf_podcast() {
	$fields = [ 
		cyn_acf_add_text( 'duration', 'مدت زمان پادکست' ),
		cyn_acf_add_file( 'file', 'فایل مربوطه' ),
		cyn_acf_add_post_object( 'related_podcasts', 'پادکست های مرتبط', CYN_PODCAST_POST_TYPE ),
	];
	$location = [ 
		[ 
			[ 
				'param' => 'post_type',
				'operator' => '==',
				'value' => CYN_PODCAST_POST_TYPE
			],
		],
	];

	cyn_register_acf_group( 'تنظیمات پادکست ها', $fields, $location );
}

function cyn_register_acf_employer() {
	$fields = [ 
		cyn_acf_add_text( 'position', 'سمت' ),
		cyn_acf_add_text( 'from_year', 'سابقه' ),
	];
	$location = [ 
		[ 
			[ 
				'param' => 'post_type',
				'operator' => '==',
				'value' => CYN_EMPLOYER_POST_TYPE
			],
		],
	];

	cyn_register_acf_group( 'تنظیمات همکاران', $fields, $location );
}

function cyn_register_acf_image() {
	$fields = [ 
		cyn_acf_add_text( 'photographer', 'عکاس' ),
		cyn_acf_add_text( 'short_description', 'توضیحات کوتاه' ),
	];
	$location = [ 
		[ 
			[ 
				'param' => 'post_type',
				'operator' => '==',
				'value' => CYN_IMAGE_POST_TYPE
			],
		],
	];

	cyn_register_acf_group( 'تنظیمات تصاویر', $fields, $location );
}

function cyn_register_acf_product() {
	$fields = [ 
		cyn_acf_add_text( 'duration', 'مدت زمان دوره' ),
		cyn_acf_add_number( 'episode_count', 'تعداد قسمت ها', 0, '', 'قسمت' ),
		cyn_acf_add_number( 'episode_duration', 'مدت زمان هر دوره', 0, '', 'دقیقه' ),
		cyn_acf_add_text( 'teacher', 'استاد' ),
	];
	$location = [ 
		[ 
			[ 
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'product'
			],
		],
	];

	cyn_register_acf_group( 'تنظیمات محصول', $fields, $location );
}

function cyn_register_acf_taxonomies_pos() {
	$fields = [ 
		cyn_acf_add_number( 'position', 'جایگاه نمایش' ),
	];
	$location = [ 
		[ 
			[ 
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => CYN_EMPLOYER_CATEGORY_TAXONOMY
			],
		],

		[ 
			[ 
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => CYN_IMAGE_CATEGORY_TAXONOMY
			],
		],
	];

	cyn_register_acf_group( 'تنظیمات', $fields, $location );
}

function cyn_register_acf_about_us() {
	$fields = [ 
		cyn_acf_add_tab( 'هیرو' ),
		cyn_acf_add_file( 'hero_video', 'ویدئوی بخش هیرو' ),
		cyn_acf_add_image( 'hero_poster', 'کاور بخش هیرو' ),
	];

	array_push( $fields, cyn_acf_add_tab( 'محتوا' ) );

	for ( $i = 1; $i <= 3; $i++ ) {
		array_push( $fields, cyn_acf_add_wysiwyg( "text_$i", "متن $i" ) );
		array_push( $fields, cyn_acf_add_image( "img_$i", "تصویر $i" ) );
	}

	array_push( $fields, cyn_acf_add_tab( 'دیگر پلتفرم ها' ) );

	for ( $i = 1; $i <= 3; $i++ ) {
		array_push( $fields, cyn_acf_add_url( "link_$i", "لینک $i" ) );
		array_push( $fields, cyn_acf_add_text( "link_text_$i", "متن لینک $i" ) );
	}

	$location = [ 
		[ 
			[ 
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/' . CYN_ABOUT_US_PAGE . '.php'
			],
		],
	];

	cyn_register_acf_group( 'تنظیمات', $fields, $location );
}

function cyn_register_acf_front() {
	$fields = [];

	for ( $i = 1; $i <= 10; $i++ ) {
		array_push( $fields, cyn_acf_add_tab( "بخش $i" ) );
		array_push( $fields, cyn_acf_add_text( "id_$i", 'آیدی بخش' ) );
		array_push( $fields, cyn_acf_add_boolean( "is_active_$i", 'فعال / غیرفعال' ) );

		array_push( $fields, cyn_acf_add_text( "title_$i", 'عنوان' ) );
		array_push( $fields, cyn_acf_add_text( "subtitle_$i", 'عنوان فرعی' ) );
		array_push( $fields, cyn_acf_add_wysiwyg( "description_$i", 'توضیحات' ) );

		array_push( $fields, cyn_acf_add_image( "desktop_banner_$i", "بنر دسکتاپ " ) );
		array_push( $fields, cyn_acf_add_image( "mobile_banner_$i", "بنر موبایل " ) );
		array_push( $fields, cyn_acf_add_options( "post_type_$i", "نوع پست تایپ ", [ CYN_VIDEO_POST_TYPE => CYN_VIDEO_POST_TYPE, CYN_PODCAST_POST_TYPE => CYN_PODCAST_POST_TYPE, 'product' => 'product' ], 0, 'value', 0, '', "home_page_select_post_type_$i" ) );
		array_push( $fields, cyn_acf_add_post_object( "posts_$i", 'پست ها', [ CYN_VIDEO_POST_TYPE, CYN_PODCAST_POST_TYPE, 'product' ], '', 1 ) );
		array_push( $fields, cyn_acf_add_url( "link_$i", "لینک" ) );

	}

	$location = [ 
		[ 
			[ 
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/' . CYN_FRONT_PAGE . '.php'
			],
		],
	];

	cyn_register_acf_group( 'تنظیمات', $fields, $location );
}

function cyn_register_acf_menu() {
	$fields = [ 
		cyn_acf_add_image( 'icon', 'آیکن' ),
	];
	$location = [ 
		[ 
			[ 
				'param' => 'nav_menu_item',
				'operator' => '==',
				'value' => 'all',
			],
		],
	];

	cyn_register_acf_group( 'تنظیمات', $fields, $location );
}