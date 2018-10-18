<?php
function financeup_scripts() {
	
	wp_enqueue_style('bootstrap_style', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('bootstrap_style_min', get_template_directory_uri() . '/css/bootstrap.min.css');

	wp_enqueue_style( 'financeup-style', get_stylesheet_uri() );

	wp_enqueue_style('financeup_color', get_template_directory_uri() . '/css/colors/default.css');
	
	wp_enqueue_style('smartmenus_min',get_template_directory_uri().'/css/jquery.smartmenus.bootstrap.css');

	wp_enqueue_style('carousel',get_template_directory_uri().'/css/owl.carousel.css');
	wp_enqueue_style('carousel_min',get_template_directory_uri().'/css/owl.carousel.min.css');

    wp_enqueue_style('owl_transitions',get_template_directory_uri().'/css/owl.transitions.css');

	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style('font-awesome-min',get_template_directory_uri().'/css/font-awesome.min.css');

	wp_enqueue_style('animate',get_template_directory_uri().'/css/animate.css');
	wp_enqueue_style('animate_min',get_template_directory_uri().'/css/animate.min.css');


	/* Js script */

    wp_enqueue_script( 'financeup-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'));

	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));

    wp_enqueue_script('smartmenus', get_template_directory_uri() . '/js/jquery.smartmenus.min.js' , array('jquery'));

    wp_enqueue_script('smartmenus_bootstrap', get_template_directory_uri() . '/js/jquery.smartmenus.bootstrap.js' , array('jquery'));

    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'));

    wp_enqueue_script('financeup_custom', get_template_directory_uri() . '/js/custom.js' , array('jquery'));


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'financeup_scripts');

//Header Custom Color
function financeup_header_color() {
    $financeup_hedaer_skin_enable = get_theme_mod('financeup_hedaer_skin_enable','false');
    if( $financeup_hedaer_skin_enable == 'true') {
    financeup_custom_header_color();
    }
}
add_action('wp_footer','financeup_header_color');

//Footer Custom Color
function financeup_footer_color() {
    $financeup_footer_color_enable = get_theme_mod('financeup_footer_color_enable','true');
    if( $financeup_footer_color_enable == 'true') {
        financeup_custom_footer_color();
    }
}
add_action('wp_footer','financeup_footer_color');


function financeup_registers() {

	wp_enqueue_script( 'customizer_script', get_template_directory_uri() . '/js/customizer.js', array("jquery"), '20120206', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'financeup_registers' );

?>