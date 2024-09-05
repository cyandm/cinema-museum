<div
	 class="container pagination flex mb-40 justify-end max-md:justify-center text-body_s text-white [&_.current]:border [&_.current]:border-white [&_.current]:rounded-full [&_.current]:text-black [&_.nav-links]:flex [&_.nav-links]:justify-center [&_.nav-links]:items-center [&_.nav-links]:gap-1 [&_.next]:flex [&_.next]:justify-center [&_.next]:items-center [&_.next]:rounded-full [&_.next]:size-8 [&_.next]:border [&_.next]:border-white [&_.prev]:flex [&_.prev]:justify-center [&_.prev]:items-center [&_.prev]:size-8 [&_.prev]:rounded-full [&_.prev]:bg-black [&_.next]:bg-black [&_.prev:hover]:bg-red-700 [&_.next:hover]:bg-red-700  [&_.prev]:border [&_.prev]:border-white [&_.prev]:p-1">

	<?php
	global $wp_query;
	$big = 999999999;
	echo the_posts_pagination( [ 
		'screen_reader_text' => ' ',
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '%#%',
		'total' => $wp_query->max_num_pages,
		'current' => max( 1, get_query_var( 'paged' ) ),
		'aria_current' => 'page',
		'show_all' => false,
		'prev_next' => true,
		'type' => 'plain',
		'prev_text' => __( '<svg class="icon size-4 rotate-[-90deg]"><use href="#icon-chevron-down"/></svg>' ),
		'next_text' => __( '<svg class="icon size-4 rotate-90"><use href="#icon-chevron-down"/></svg>' ),
		'before_page_number' => '<span class="rounded-full p-1 inline-flex justify-center items-center size-8 transition-all duration-300 cursor-pointer text-white hover:border-white hover:bg-red-700">',
		'after_page_number' => '</span>',
	] );
	?>

</div>