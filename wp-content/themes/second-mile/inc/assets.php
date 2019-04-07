<?php
/**
 * Add all assets for theme
 *
 * @package second-mile
 */

if ( ! function_exists( 'secondmile_scripts' ) ) :

	function secondmile_scripts() {

		wp_register_script( 'polyfill', get_template_directory_uri() . '/assets/js/polyfill.js', array(), '1.0.0', true );
		wp_enqueue_script( 'polyfill' );
		
		wp_register_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
		wp_enqueue_script( 'main' );
		
		if ( is_front_page() ) :
			wp_register_script( 'home', get_template_directory_uri() . '/assets/js/home.js', array(), '1.0.0', true );
			wp_enqueue_script( 'home' );
		endif;

		if ( is_page( 'who-we-are' ) ) :
			wp_register_script( 'who-we-are', get_template_directory_uri() . '/assets/js/who-we-are.js', array(), '1.0.0', true );
			wp_enqueue_script( 'who-we-are' );
		endif;
		
		if ( is_home() ) :
			wp_register_script( 'donate', get_template_directory_uri() . '/assets/js/donate.js', array(), '1.0.0', true );
			wp_enqueue_script( 'donate' );
		endif;

		if ( is_category() ) :
			wp_register_script( 'ministry-archive', get_template_directory_uri() . '/assets/js/ministry-archive.js', array(), '1.0.0', true );
			wp_enqueue_script( 'ministry-archive' );
		endif;

		if ( is_singular( 'post' ) ) :
			wp_register_script( 'ministry-single', get_template_directory_uri() . '/assets/js/ministry-single.js', array(), '1.0.0', true );
			wp_enqueue_script( 'ministry-single' );
		endif;

		if ( is_page( 'contact' ) ) :
			wp_register_script( 'contact', get_template_directory_uri() . '/assets/js/contact.js', array(), '1.0.0', true );
			wp_enqueue_script( 'contact' );
		endif;

	}

endif;

add_action('wp_enqueue_scripts', 'secondmile_scripts');

if ( ! function_exists( 'secondmile_styles' ) ) :

	function secondmile_styles() {
 
			wp_register_style( 'sm-google-fonts', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700|Oswald:400,700', false );
			wp_enqueue_style( 'sm-google-fonts' );

	    wp_register_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', false );
	    wp_enqueue_style( 'main' );

	}

endif;

add_action('wp_enqueue_scripts', 'secondmile_styles');

/**
* Dequeue jQuery Migrate script in WordPress.
*/
// function secondmile_remove_jquery( &$scripts) {
//     if ( ! is_admin() ) {
//         $scripts->remove( 'jquery');
//         $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
//     }
// }

// add_filter( 'wp_default_scripts', 'secondmile_remove_jquery' );
