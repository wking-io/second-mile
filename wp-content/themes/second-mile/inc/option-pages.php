<?php
/**
 * Add option pages for CPTs
 *
 * @package second-mile
 */

function add_option_page( $name ) {
	if( function_exists( 'acf_add_options_sub_page' ) ) {
		// add sub page
		acf_add_options_sub_page( array(
			'page_title' 	=> $name,
			'menu_slug'		=> strtolower( $name ) . '-settings',
			'parent_slug' => 'edit.php',
		) );
	
	}
}

function add_option_pages() {
	add_option_page('Donation Overview');
	add_option_page('Community Overview');
	add_option_page('Education Overview');
	add_option_page('Family Overview');

	if( function_exists( 'acf_add_options_page' ) ) {
		// add sub page
		acf_add_options_page( array(
			'page_title' => 'Company Settings',
			'menu_slug'	 => 'company-settings',
			'icon_url' 	 => 'dashicons-building',
			'position'	 => 75
		) );
	
	}

}

add_action( 'acf/init', 'add_option_pages' );