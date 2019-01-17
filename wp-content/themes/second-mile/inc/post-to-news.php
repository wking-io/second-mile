<?php
/**
 * Change Posts to News
 *
 * @package second-mile
 */

function secondmile_change_post_to_news( $post_type, $post_type_object ) {
	if ( 'post' !== $post_type ) {
		return;
	}

	$post_type_object->label = __( 'News', 'second-mile' );
	$post_type_object->menu_icon = 'dashicons-media-text';
	$post_type_object->menu_position = 22;

	$post_type_object->labels->name = __( 'News', 'second-mile' );
	$post_type_object->labels->singular_name = __( 'News', 'second-mile' );
	$post_type_object->labels->add_new = __( 'Add News', 'second-mile' );
	$post_type_object->labels->add_new_item = __( 'Add News', 'second-mile' );
	$post_type_object->labels->edit_item = __( 'Edit News', 'second-mile' );
	$post_type_object->labels->new_item = __( 'News', 'second-mile' );
	$post_type_object->labels->view_item = __( 'View News', 'second-mile' );
	$post_type_object->labels->search_items = __( 'Search News', 'second-mile' );
	$post_type_object->labels->not_found = __( 'No News found', 'second-mile' );
	$post_type_object->labels->not_found_in_trash = __( 'No News found in Trash', 'second-mile' );
	$post_type_object->labels->all_items = __( 'All News', 'second-mile' );
	$post_type_object->labels->menu_name = __( 'News', 'second-mile' );
	$post_type_object->labels->name_admin_bar = __( 'News', 'second-mile' );
}

add_action( 'registered_post_type', 'secondmile_change_post_to_news', 10, 2 );
