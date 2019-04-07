<?php
/**
 * Enqueues all css and script used in the theme
 *
 * @return void
 */
function theme_enqueues_styles_scripts() {

	// Comment reply JS
	if( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Popper
//	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');

	// Bootstrap : load js part from cdn
//	wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' , array('jquery', 'popper'), '4.0.0', true);



	// @TODO : Uncomment what you need
	// Animate CSS
	//wp_enqueue_style( 'animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css' );

	// Font Awesome
	// wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );


	// ENQUEUE your css below

	// ENQUEUE your js below
	wp_enqueue_script( 'libs', get_stylesheet_directory_uri() . '/dist/js/libs.js' , array(), '1.0', true);

	// Default theme stylesheet
    wp_enqueue_style('vanilla', get_template_directory_uri() . '/dist/css/theme.css', false, filemtime(get_stylesheet_directory() . '/dist/css/theme.css'));

	// Default js of your theme to add your own js scripts, add dependances if needed
	wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/dist/js/main.js' , array(), '1.0', true);



}
add_action('wp_enqueue_scripts', 'theme_enqueues_styles_scripts');


/**
 * Unregister jQuery and jQueryUI from WP Core
 *
 * @return void
 */
function theme_deregister_jquery_from_wp_core() {
	if( is_admin() ) {
		return;
	}

	// Use jquery and jquery core from the google cdn instead of wordpress included
	wp_deregister_script( 'jquery-ui-core' );
	wp_deregister_script( 'jquery-ui-tab' );
	wp_deregister_script( 'jquery-ui-autocomplete' );
	wp_deregister_script( 'jquery-ui-accordion' );
	wp_deregister_script( 'jquery-ui-autocomplete' );
	wp_deregister_script( 'jquery-ui-button' );
	wp_deregister_script( 'jquery-ui-datepicker');
	wp_deregister_script( 'jquery-ui-dialog' );
	wp_deregister_script( 'jquery-ui-draggable' );
	wp_deregister_script( 'jquery-ui-droppable' );
	wp_deregister_script( 'jquery-ui-mouse' );
	wp_deregister_script( 'jquery-ui-position' );
	wp_deregister_script( 'jquery-ui-progressbar');
	wp_deregister_script( 'jquery-ui-resizable' );
	wp_deregister_script( 'jquery-ui-selectable');
	wp_deregister_script( 'jquery-ui-slider' );
	wp_deregister_script( 'jquery-ui-sortable' );
	wp_deregister_script( 'jquery-ui-tabs' );
	wp_deregister_script( 'jquery-ui-widget' );
	wp_deregister_script( 'jquery' );
}

/**
 * Register jQuery and jQuery UI from Google Cdn
 *
 * @return void
 */
function theme_register_jquery_from_cdn() {
	if( is_admin() ) {
		return;
	}
	// Unregister currents jquery
	theme_deregister_jquery_from_wp_core();

	// Register from google cdn
//	wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js' );
//	wp_register_script( 'jquery-ui-core', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array( 'jquery' ), '1.12.1', true);
}
add_action('wp_head', 'theme_register_jquery_from_cdn', 1 );
