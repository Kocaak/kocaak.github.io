<?php
function financeup_top_header_setting( $wp_customize ) {
/* Header Section */
	$wp_customize->add_panel( 'top_header_options', array(
		'priority' => 450,
		'capability' => 'edit_theme_options',
		'title' => __('Top Header Settings','financeup'),
	) );
	
	$wp_customize->add_section( 'top_header_contact' , array(
		'title' => __('Header Info Details Setting','financeup'),
		'panel' => 'top_header_options',
   	) );
	
	$wp_customize->add_setting(
		'financeup_head_info_one', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'financeup_top_header_sanitize_text',
		'default' => '<a><i class="fa fa fa-clock-o"></i>10:00 am &gt; 7:00 pm</a>',
    ) );
    $wp_customize->add_control( 'financeup_head_info_one', array(
        'label' => __('Info One:','financeup'),
        'section' => 'top_header_contact',
        'type' => 'textarea',
    ) );
	
	
	$wp_customize->add_setting(
		'financeup_head_info_two', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'financeup_top_header_sanitize_text',
		'default' => '<a><i class="fa fa fa-phone"></i>9876541230</a>',
    ) );
    $wp_customize->add_control( 'financeup_head_info_two', array(
        'label' => __('Info Two:','financeup'),
        'section' => 'top_header_contact',
        'type' => 'textarea',
    ) );
	
	function financeup_top_header_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

	}
	
	}
	add_action( 'customize_register', 'financeup_top_header_setting' );
	?>