<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

function check_field_connections( $is_visible, $node ) {
	
	if ( isset( $node->settings->connections ) ) {
		foreach ( $node->settings->connections as $key => $connection ) {
			if ( ! empty( $connection ) && empty( $node->settings->$key ) ) {
				return false;
			}
		}
	}
	
	return $is_visible;
}

add_filter( 'fl_builder_is_node_visible', 'check_field_connections', 10, 2 );

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );