<?php
function financeup_header_setting( $wp_customize ) {
/* Header Section */
	$wp_customize->add_panel( 'header_options', array(
		'priority' => 450,
		'capability' => 'edit_theme_options',
		'title' => __('Header Settings', 'financeup'),
	) );
	
	// add Header widget one Setting

    $wp_customize->add_section( 'header_widget_one' , array(
		'title' => __('Header Widget One Setting', 'financeup'),
		'panel' => 'header_options',
		'priority'    => 600,
   	) );

   	$wp_customize->add_setting(
    	'financeup_header_widget_one_icon', array(
        'default' => __('fa-map-marker','financeup'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'financeup_header_widget_one_icon', array(
        'label' => __('One Icon','financeup'),
        'section' => 'header_widget_one',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'financeup_header_widget_one_title', array(
        'default' => __('1240 Park Avenue','financeup'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'financeup_header_widget_one_title',array(
        'label'   => __('One Title','financeup'),
        'section' => 'header_widget_one',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'financeup_header_widget_one_description', array(
        'capability' => 'edit_theme_options',
        'default' => __('NYC, USA 256323','financeup'),
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'financeup_header_widget_one_description', array(
        'label' => __('One Description','financeup'),
        'section' => 'header_widget_one',
        'type' => 'textarea',
    ) );

    // add Header widget Two Setting
    
    $wp_customize->add_section( 'header_widget_two' , array(
		'title' => __('Header Widget Two Setting', 'financeup'),
		'panel' => 'header_options',
		'priority'    => 620,
   	) );

   	$wp_customize->add_setting(
    	'financeup_header_widget_two_icon', array(
		'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'fa fa-clock-o',
    ) );  
    $wp_customize->add_control( 
        'financeup_header_widget_two_icon', array(
        'label' => __('Two Icon','financeup'),
        'section' => 'header_widget_two',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'financeup_header_widget_two_title', array(
		'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default'=> __('7:30 AM - 7:30 PM','financeup'),
    ) );  
    $wp_customize->add_control( 
        'financeup_header_widget_two_title',array(
        'label'   => __('Two Title','financeup'),
        'section' => 'header_widget_two',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'financeup_header_widget_two_description', array(
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default'=> __('Monday to Saturday','financeup'),
    ) );  
    $wp_customize->add_control( 
        'financeup_header_widget_two_description', array(
        'label' => __('Two Description','financeup'),
        'section' => 'header_widget_two',
        'type' => 'textarea',
    ) );

    // add Header widget Three Setting
    
    $wp_customize->add_section( 'header_widget_three' , array(
		'title' => __('Header Widget Three Setting', 'financeup'),
		'panel' => 'header_options',
		'priority'    => 620,
   	) );

   	$wp_customize->add_setting(
    	'financeup_header_widget_three_icon', array(
		'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'fa fa-phone',
        ) );  
    $wp_customize->add_control( 
        'financeup_header_widget_three_icon', array(
        'label' => __('Three Icon','financeup'),
        'section' => 'header_widget_three',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'financeup_header_widget_three_title', array(
		'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => '+ (007) 548 58 5400',
    ) );  
    $wp_customize->add_control( 
        'financeup_header_widget_three_title',array(
        'label'   => __('Three Title','financeup'),
        'section' => 'header_widget_three',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'financeup_header_widget_three_description', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'info@themeansar.com',
    ) );  
    $wp_customize->add_control( 
        'financeup_header_widget_three_description', array(
        'label' => __('Three Description','financeup'),
        'section' => 'header_widget_three',
        'type' => 'textarea',
    ) );

    // add Header widget Three Setting
    
    $wp_customize->add_section( 'header_widget_four' , array(
        'title' => __('Header Widget Four Setting', 'financeup'),
        'panel' => 'header_options',
        'priority'    => 620,
    ) );

    $wp_customize->add_setting(
        'financeup_header_widget_four_label', array(
		'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => __('Get Quote','financeup'),
    ) );  
    $wp_customize->add_control( 
        'financeup_header_widget_four_label', array(
        'label' => __('Four Label','financeup'),
        'section' => 'header_widget_four',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'financeup_header_widget_four_link', array(
		'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );  
    $wp_customize->add_control( 
        'financeup_header_widget_four_link',array(
        'label'   => __('Four Link','financeup'),
        'section' => 'header_widget_four',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'financeup_header_widget_four_target', array(
		'capability' => 'edit_theme_options',
        'sanitize_callback' => 'financeup_header_sanitize_checkbox',
    ) );  
    $wp_customize->add_control( 
        'financeup_header_widget_four_target', array(
        'label' => __('Open Link New window','financeup'),
        'section' => 'header_widget_four',
        'type' => 'checkbox',
    ) );
	
	
	function financeup_header_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
	}
	add_action( 'customize_register', 'financeup_header_setting' );
	?>