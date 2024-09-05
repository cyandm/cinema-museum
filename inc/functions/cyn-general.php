<?php

function cyn_get_component( $name, $args = [] ) {
	get_template_part( '/partials/components/' . $name, null, $args );
}

function cyn_get_card( $name, $args = [] ) {
	get_template_part( '/partials/cards/' . $name, null, $args );
}

function cyn_get_page( $name, $args = [] ) {
	get_template_part( '/partials/pages/' . $name, null, $args );
}

function cyn_get_part( $name, $args = [] ) {
	get_template_part( '/partials/parts/' . $name, null, $args );
}

function cyn_get_popup( $name, $args = [] ) {
	get_template_part( '/partials/popups/' . $name, null, $args );
}


add_action( 'get_the_archive_title_prefix', 'cyn_remove_prefix' );
function cyn_remove_prefix() {
	return '';
}