<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$custom_acf = [ 
	[ 
		'key' => 'episode_count',
		'label' => 'تعداد قسمت ها',
		'append' => 'قسمت'
	],
	[ 
		'key' => 'episode_duration',
		'label' => 'مدت زمان هر دوره',
		'append' => 'دقیقه'
	],
	[ 
		'key' => 'teacher',
		'label' => 'استاد',
	],
];




foreach ( $custom_acf as $acf ) :
	if ( empty( get_field( $acf['key'], $product->get_id() ) ) )
		continue;
	?>

	<div class="flex my-4">
		<div class="text-white">
			<?php echo $acf['label'] . ':' ?>
		</div>

		<div class="text-white/65">
			<?php echo get_field( $acf['key'], $product->get_id() ) . ' ' ?>
			<?php echo $acf['append'] ?? '' ?>
		</div>
	</div>

<?php endforeach; ?>