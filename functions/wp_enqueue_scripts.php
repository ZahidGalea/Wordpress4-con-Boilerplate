<?php 

/**
 * Scripts Enqueue
 * Registers and Enqueue Scripts in footer or head
 *
 * @since   1.0
 * @version 1.2
 * @see     https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
 * @see     https://developer.wordpress.org/reference/functions/wp_register_script/
 * @see     https://developer.wordpress.org/reference/functions/wp_deregister_script/
 * @see     https://developer.wordpress.org/reference/functions/get_theme_file_uri/
 * @see     https://developer.wordpress.org/reference/functions/get_parent_theme_file_uri/
 */
function dl_enqueue_scripts() {

	global $theme_options;
	$theme_data = wp_get_theme();

	/* Deregister Scripts */
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'jquery-migrate' );


	/* Register Scripts */
	wp_register_script( 'flickity', get_theme_file_uri('/assets/js/lib/flickity.pkgd.js'), array('jquery-migrate'), '2.1.0', true );
	wp_register_script( 'flexslider', get_theme_file_uri('/assets/js/lib/jquery.flexslider.js'), array('jquery-migrate'), null, true );
	wp_register_script( 'main_js', get_theme_file_uri('/assets/js/functions.js'), array('jquery-migrate'), $theme_data->get( 'Version' ), true );
	wp_register_script('custom', get_theme_file_uri('/assets/js/custom.js'), null, '3.3.1', true);
	wp_register_script('functions', get_theme_file_uri('/assets/js/functions.js'), null, '3.3.1', true);
	wp_register_script('jq17', get_theme_file_uri('/assets/js/jquery-1.7.2.js'), null, '3.3.1', true);
	wp_register_script('easing', get_theme_file_uri('/assets/js/jquery.easing.1.3.js'), null, '3.3.1', true);
	wp_register_script('nivoslider', get_theme_file_uri('/assets/js/jquery.nivo.slider.pack.js'), null, '3.3.1', true);
	wp_register_script('prettyphoto', get_theme_file_uri('/assets/js/jquery.prettyPhoto.js'), null, '3.3.1', true);
	wp_register_script('quicksand', get_theme_file_uri('/assets/js/jquery.quicksand.js'), null, '3.3.1', true);
	wp_register_script('script', get_theme_file_uri('/assets/js/script.js'), null, '3.3.1', true);


	if ($theme_options['woocommerce_enabled'] || $theme_options['slider']['flexslider'] || $theme_options['slider']['flickity']) {

		wp_register_script('jquery', get_theme_file_uri('/assets/js/lib/jquery.min.js'), null, '3.3.1', true);
		wp_register_script('jquery-migrate', get_theme_file_uri('/assets/js/lib/jquery-migrate.min.js'), array('jquery'), '3.0.0', true);

	}


	/* Enqueue Scripts */
	if ( $theme_options['slider']['flexslider'] ) {
		wp_enqueue_script( 'flexslider' );
	}

	if ( $theme_options['slider']['flickity'] ) {
		wp_enqueue_script( 'flickity' );
	}

	wp_enqueue_script( 'main_js' );
	wp_enqueue_script( 'custom' );
	wp_enqueue_script( 'functions' );
	wp_enqueue_script( 'jq17' );
	wp_enqueue_script( 'easing' );
	wp_enqueue_script( 'nivoslider' );
	wp_enqueue_script( 'prettyphoto' );
	wp_enqueue_script( 'quicksand' );
	wp_enqueue_script( 'script' );

}

add_action( 'wp_enqueue_scripts', 'dl_enqueue_scripts' );
