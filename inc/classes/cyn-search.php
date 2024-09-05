<?php

class cyn_search {
	function __construct() {
		add_action( 'pre_get_posts', [ $this, 'modify_search_query' ] );
	}

	public function modify_search_query( WP_Query $query ) {
		if ( ! $query->is_main_query() || ! $query->is_search() )
			return;

		$query->set( 'posts_per_page', -1 );
		$query->set( 'post_type', $_GET['search-type'] );
	}
}