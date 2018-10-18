<?php 
// Adding customizer home page setting
function financeup_style_customizer( $wp_customize ){
//Theme Layout Panel
	 $wp_customize->add_panel('financeup_theme_style_setting', array(
	 	'priority'   		=> 		300,
     	'capability'       =>      'edit_theme_options',
     	'theme_supports'   =>      '',
     	'title'            =>      __( 'Theme Style Palette', 'financeup' ),
    ) );
	
	/* Theme Header Style settings */
	$wp_customize->add_section( 'financeup_theme_skin_color', array(
		'title' => __('Set Your Header Color', 'financeup'),
		'panel' => 'financeup_theme_style_setting',
   	) );
	
	$wp_customize->add_setting('financeup_hedaer_skin_enable', array(
        'default' => 'false',
		'sanitize_callback' => 'financeup_style_sanitize_checkbox',
    ) );
	$wp_customize->add_control('financeup_hedaer_skin_enable', array(
        'label' => __('Enable/Disable Header Custom Color Feature','financeup'),
        'section' => 'financeup_theme_skin_color',
        'type' => 'radio',
		'choices' => array('true' => 'On','false' => 'Off',)
    ) );
	
	
	//Top header background color
	$wp_customize->add_setting('financeup_top_background', array(
	'default' => '#303f9f',
	'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'financeup_top_background', array(
		'label'      => __('Top Header Background Color', 'financeup' ),
		'section'    => 'financeup_theme_skin_color',
		'settings'   => 'financeup_top_background',) 
	) );
	
	
	//Top header background color
	$wp_customize->add_setting('financeup_top_color', array(
	'default' => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'financeup_top_color', array(
		'label'      => __('Top Header Text Color', 'financeup' ),
		'section'    => 'financeup_theme_skin_color',
		'settings'   => 'financeup_top_color',) 
	) );
	//header background color
	$wp_customize->add_setting('financeup_header_background', array(
	'default' => '#fff',
	'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'financeup_header_background', array(
		'label'      => __('Header Background Color', 'financeup' ),
		'section'    => 'financeup_theme_skin_color',
		'settings'   => 'financeup_header_background',) 
	) );

	//Site Title Text color
	$wp_customize->add_setting('financeup_site_title_color', array(
		'default' => '#303f9f',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,'financeup_site_title_color', array(
		'label'      => __('Site Title Text Color', 'financeup' ),
		'section'    => 'financeup_theme_skin_color',
		'settings'   => 'financeup_site_title_color',) 
	) );

	
	//Menu Bar Background color
	$wp_customize->add_setting('financeup_menu_bar', array(
		'default' => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'financeup_menu_bar', array(
		'label' => __('Menu Bar Background Color', 'financeup' ),
		'section' => 'financeup_theme_skin_color',
		'settings' => 'financeup_menu_bar',) 
	) );
	
	//Menu Background color
	$wp_customize->add_setting('financeup_menu_background', array(
		'default' => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'financeup_menu_background', array(
		'label' => __('Menu Background Color', 'financeup' ),
		'section' => 'financeup_theme_skin_color',
		'settings' => 'financeup_menu_background',) 
	) );

	//Menu Background Hover color
	$wp_customize->add_setting('financeup_menu_background_hover', array(
		'default' => '#f5f5f5',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'financeup_menu_background_hover', array(
		'label'      => __('Menu Background Hover/Active Color', 'financeup' ),
		'section'    => 'financeup_theme_skin_color',
		'settings'   => 'financeup_menu_background_hover',) 
	) );

	//Menu Border color Bottom color
	$wp_customize->add_setting('financeup_menu_border_color', array(
		'default' => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'financeup_menu_border_color', array(
		'label'      => __('Menu Border Bottom color', 'financeup' ),
		'section'    => 'financeup_theme_skin_color',
		'settings'   => 'financeup_menu_border_color',) 
	) );

	//Menu Border color Bottom Hover/Active color
	$wp_customize->add_setting('financeup_menu_border_active_color', array(
		'default' => '#303f9f',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'financeup_menu_border_active_color', array(
		'label'      => __('Menu Border Bottom Hover/Active color', 'financeup' ),
		'section'    => 'financeup_theme_skin_color',
		'settings'   => 'financeup_menu_border_active_color',) 
	) );

	//Menu text color & Menu active color
	$wp_customize->add_setting('financeup_menu_color', array(
		'default' => '#333',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'financeup_menu_color', array(
		'label'      => __('Menu Text Color', 'financeup' ),
		'section'    => 'financeup_theme_skin_color',
		'settings'   => 'financeup_menu_color',) 
	) );
	
	//Menu active color-radio-
	$wp_customize->add_setting('financeup_menu_active_color', array(
		'default' => '#303f9f',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'financeup_menu_active_color', array(
		'label' => __('Menu Text Hover/Active Color', 'financeup' ),
		'section' => 'financeup_theme_skin_color',
		'settings' => 'financeup_menu_active_color',) 
	) );

	//Sub Menu Background Color
	$wp_customize->add_setting('financeup_menu_submenu_background', array(
		'default' => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'financeup_menu_submenu_background', array(
		'label' => __('Sub Menu Background Color', 'financeup' ),
		'section' => 'financeup_theme_skin_color',
		'settings' => 'financeup_menu_submenu_background',) 
	) );
	
	
	//Sub Menu Hover Color
	$wp_customize->add_setting('financeup_menu_submenu_background_hover', array(
		'default' => '#303f9f',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'financeup_menu_submenu_background_hover', array(
		'label'      => __('Sub Menu Background Hover color', 'financeup' ),
		'section'    => 'financeup_theme_skin_color',
		'settings'   => 'financeup_menu_submenu_background_hover',) 
	) );
	
	//Sub Menu text Color
	$wp_customize->add_setting('financeup_menu_submenu_color', array(
		'default' => '#333',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'financeup_menu_submenu_color', array(
		'label'      => __('Sub Menu Text Color', 'financeup' ),
		'section'    => 'financeup_theme_skin_color',
		'settings'   => 'financeup_menu_submenu_color',) 
	) );
	
	/* Theme Footer Style settings */
	$wp_customize->add_section( 'financeup_footer_color' , array(
		'title' => __('Set Your Footer Color', 'financeup'),
		'panel' => 'financeup_theme_style_setting',
   	) );
	
	//Footer Enable Color
	$wp_customize->add_setting('financeup_footer_color_enable', array(
        'default' => 'true',
		'sanitize_callback' => 'financeup_style_sanitize_checkbox',
		
    ) );
	$wp_customize->add_control('financeup_footer_color_enable', array(
        'label' => __('Enable/Disable Footer Custom Color Feature','financeup'),
        'section' => 'financeup_footer_color',
        'type' => 'radio',
		'choices' => array('true' => 'On','false' => 'Off',)
    ) );
	
	
	
	//Footer background
	$wp_customize->add_setting('financeup_footer_background', array(
		'default' => '#202830',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'financeup_footer_background', array(
		'label' => __('Footer Background Color ', 'financeup' ),
		'section' => 'financeup_footer_color',
		'settings' => 'financeup_footer_background',) 
	) );
	
	//Footer Widget Heading color
	$wp_customize->add_setting('financeup_footer_head_color', array(
		'default' => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'financeup_footer_head_color', array(
		'label' => __('Footer Widget Heading Color ', 'financeup' ),
		'section' => 'financeup_footer_color',
		'settings' => 'financeup_footer_head_color',) 
	) );

	//Footer color
	$wp_customize->add_setting('financeup_footer_text_color', array(
	'default' => '#969ea7',
	'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'financeup_footer_text_color', array(
		'label' => __('Footer Text Color ', 'financeup' ),
		'section' => 'financeup_footer_color',
		'settings' => 'financeup_footer_text_color',) 
	) );

	//Footer Copyright background
	$wp_customize->add_setting('financeup_footer_copy_background', array(
		'default' => '#1a2128',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'financeup_footer_copy_background', array(
		'label' => __('Footer Copyright Background Color ', 'financeup' ),
		'section' => 'financeup_footer_color',
		'settings' => 'financeup_footer_copy_background',) 
	) );

	//Footer Copyright Color
	$wp_customize->add_setting('financeup_footer_copy_color', array(
		'default' => '#969ea7',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'financeup_footer_copy_color', array(
		'label' => __('Footer Copyright Text Color ', 'financeup' ),
		'section' => 'financeup_footer_color',
		'settings' => 'financeup_footer_copy_color',) 
	) );
	

	/* Theme Footer Style settings end */
	
	
	function financeup_style_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	
}
add_action( 'customize_register', 'financeup_style_customizer' );