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

	$post_type_object->label = __( 'Ministries', 'second-mile' );
	$post_type_object->menu_icon = 'dashicons-admin-multisite';
	$post_type_object->menu_position = 22;

	$post_type_object->labels->name = __( 'Ministries', 'second-mile' );
	$post_type_object->labels->singular_name = __( 'Ministries', 'second-mile' );
	$post_type_object->labels->add_new = __( 'Add Ministry', 'second-mile' );
	$post_type_object->labels->add_new_item = __( 'Add Ministry', 'second-mile' );
	$post_type_object->labels->edit_item = __( 'Edit Ministry', 'second-mile' );
	$post_type_object->labels->new_item = __( 'Ministry', 'second-mile' );
	$post_type_object->labels->view_item = __( 'View Ministry', 'second-mile' );
	$post_type_object->labels->search_items = __( 'Search Ministries', 'second-mile' );
	$post_type_object->labels->not_found = __( 'No Ministries found', 'second-mile' );
	$post_type_object->labels->not_found_in_trash = __( 'No Ministries found in Trash', 'second-mile' );
	$post_type_object->labels->all_items = __( 'All Ministries', 'second-mile' );
	$post_type_object->labels->menu_name = __( 'Ministry', 'second-mile' );
	$post_type_object->labels->name_admin_bar = __( 'Ministry', 'second-mile' );
}

add_action( 'registered_post_type', 'secondmile_change_post_to_news', 10, 2 );
