<?php
function financeup_homepage_setting( $wp_customize ) {

	/* Option list of all post */  
    $options_posts = array();
    $options_posts_obj = get_posts('posts_per_page=-1');
    $options_posts[''] = __( 'Choose Post', 'financeup' );
    foreach ( $options_posts_obj as $posts ) {
        $options_posts[$posts->ID] = $posts->post_title;
    }   

			$wp_customize->add_panel( 'homepage_setting', array(
                'priority'       => 450,
                'capability'     => 'edit_theme_options',
                'title'      => __('Frontpage Section Settings', 'financeup'),
				'description' => __('If you want homepage like slider, service, callout, news. Firstly create a page and assign homepage template then set your homepage using reading setting (Theme Dashboard >> Settings >> Reading), Click a static page (select below) and select your frontPage template like homePage template and set your posts blog page. Then click save changes','financeup'),
            ) );

            /* --------------------------------------
            =========================================
            Slider Section
            =========================================
            -----------------------------------------*/ 
            $wp_customize->add_section(
                'financeup_slider_section_settings', array(
                'title' => __('Slider Setting','financeup'),
                'description' => '',
                'panel'  => 'homepage_setting',
            ) );
            
            
            //Enable slider
            $wp_customize->add_setting(
                'financeup_slider_enable', 
				array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'financeup_homepage_sanitize_checkbox',
            ) );    
            $wp_customize->add_control( 
                'financeup_slider_enable', array(
                'label'   => __('Enable Slider Section','financeup'),
                'section' => 'financeup_slider_section_settings',
                'type' => 'checkbox',
            ) );
            
            //Select Post One
            $wp_customize->add_setting('slider_post_one',array(
                'capability'=>'edit_theme_options',
                'sanitize_callback'=>'sanitize_text_field',
            ));
            
            $wp_customize->add_control('slider_post_one',array(
                'label' => __('Select Post One','financeup'),
                'section'=>'financeup_slider_section_settings',
                'type'=>'select',
                'choices'=>$options_posts,
            ));
            
            //Select Post Two
            $wp_customize->add_setting('slider_post_two',array(
                'capability'=>'edit_theme_options',
                'sanitize_callback'=>'sanitize_text_field',
            ));
            
            $wp_customize->add_control('slider_post_two',array(
                'label' => __('Select Post Two','financeup'),
                'section'=>'financeup_slider_section_settings',
                'type'=>'select',
                'choices'=>$options_posts,
            ));
            
            //Select Post Three
            $wp_customize->add_setting('slider_post_three',array(
                'capability'=>'edit_theme_options',
                'sanitize_callback'=>'sanitize_text_field',
            ));
            
            $wp_customize->add_control('slider_post_three',array(
                'label' => __('Select Post Three','financeup'),
                'section'=>'financeup_slider_section_settings',
                'type'=>'select',
                'choices'=>$options_posts,
            ));
			
			
			class fianceup_slider_Customize_Control extends WP_Customize_Control {
				
				public $type = 'new_menu';
				public function render_content() {
				?>
				<p>
				<?php _e('How to create a slider :- First, when you create a post, upload the slider title, slider descritpion or image to the post,Then, if you have created a slider post, get it selected here','financeup'); ?>
				</p>
				<?php
				}
			}
			
			$wp_customize->add_setting('slider_widget',	array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			
			$wp_customize->add_control( new fianceup_slider_Customize_Control( $wp_customize, 'slider_widget', array(	
				'section' => 'financeup_slider_section_settings',
			) )	);

		    /* --------------------------------------
		    =========================================
		    Serice Section
		    =========================================
		    -----------------------------------------*/  
		    // add section to manage Services
		    $wp_customize->add_section(
		        'financeup_service_section_settings', array(
		        'title' => __('Service Setting','financeup'),
		        'description' => '',
		        'panel'  => 'homepage_setting',
		    ) );

            //Enable service
            $wp_customize->add_setting(
                'financeup_service_enable', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'financeup_homepage_sanitize_checkbox',
            ) );    
            $wp_customize->add_control( 
                'financeup_service_enable', array(
                'label'   => __('Enable Service Section','financeup'),
                'section' => 'financeup_service_section_settings',
                'type' => 'checkbox',
            ) );

            //Service Title setting
		   	$wp_customize->add_setting(
                'financeup_service_title', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'financeup_homepage_sanitize_text',
				'transport' => 'postMessage',
            ) );	
            $wp_customize->add_control( 
            	'financeup_service_title',array(
                'label'   => __('Service Title','financeup'),
                'section' => 'financeup_service_section_settings',
                'type' => 'text',
            ) );

            //Service SubTitle setting
            $wp_customize->add_setting(
                'financeup_service_subtitle', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'financeup_homepage_sanitize_text',
				'transport' => 'postMessage',
            ) );  
            $wp_customize->add_control( 'financeup_service_subtitle', array(
                'label'   => __('Service Subtitle','financeup'),
                'section' => 'financeup_service_section_settings',
                'type' => 'textarea',
            ) );
			
			class fianceup_service_Customize_Control extends WP_Customize_Control {
				
				public $type = 'new_menu';
				public function render_content() {
				?>
				<p>
				<a href="<?php bloginfo ( 'url' );?>/wp-admin/widgets.php" class="button"  target="_blank"><?php _e( 'Click here to add service', 'financeup' ); ?></a></br>
				<?php _e('Drag & Drop Financeup: Service Widget On Service Section Widget Area Then Select Service Page and DIsplay Your Service Content in Homepage.','financeup'); ?>
				</p>
				<?php
				}
			}
			
			$wp_customize->add_setting('service_widget',	array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			
			$wp_customize->add_control( new fianceup_service_Customize_Control( $wp_customize, 'service_widget', array(	
				'section' => 'financeup_service_section_settings',
			) )	);

            
			/* --------------------------------------
		    =========================================
		    Callout Section
		    =========================================
		    -----------------------------------------*/
		    // add section to manage Callout
		    $wp_customize->add_section(
		    	'financeup_callout_section_settings', array(
		        'title' => __('Callout Setting','financeup'),
		        'description' => '',
		        'panel'  => 'homepage_setting',
		    ) );

            //Enable contact
            $wp_customize->add_setting(
                'financeup_callout_enable', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'financeup_homepage_sanitize_checkbox',
            ) );    
            $wp_customize->add_control( 
                'financeup_callout_enable', array(
                'label'   => __('Enable Callout Section','financeup'),
                'section' => 'financeup_callout_section_settings',
                'type' => 'checkbox',
            ) );

		    //Callout Background image
		    $wp_customize->add_setting( 
		    	'financeup_callout_background', array(
		    	'sanitize_callback' => 'financeup_sanitize_image',
		    ) );

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
		    	'financeup_callout_background', array(
		    	'label'    => __( 'Choose Background Image', 'financeup' ),
		    	'section'  => 'financeup_callout_section_settings',
		    	'settings' => 'financeup_callout_background',) 
		    ) );
			
			
			$wp_customize->add_setting( 
		    	'financeup_overlay_callout_color_control', array(
		    	'sanitize_callback' => 'sanitize_text_field',
		    ) );

		    	
            $wp_customize->add_control(new Financeup_Customize_Alpha_Color_Control( $wp_customize,'financeup_overlay_callout_color_control', array(
               'label'      => __('Choose Background Overlay Color', 'financeup' ),
                'palette' => true,
                'section' => 'financeup_callout_section_settings')
            ) );
			
			
			
			

		   // Callout Title Setting
		    $wp_customize->add_setting(
		    	'financeup_callout_title', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'financeup_homepage_sanitize_text',
		    ) );	
		    $wp_customize->add_control( 
		    	'financeup_callout_title', array(
		    	'label'   => __('Callout Title','financeup'),
		    	'section' => 'financeup_callout_section_settings',
		    	'type' => 'text',
		    ) );	

			// Callout Description Setting	    
		    $wp_customize->add_setting(
		    	'financeup_callout_description', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'financeup_homepage_sanitize_text',
		    ) );	
		    $wp_customize->add_control( 
		    	'financeup_callout_description', array(
		    	'label'   => __('Callout Description','financeup'),
		    	'section' => 'financeup_callout_section_settings',
		    	'type' => 'textarea',
		    ) );	

		    // Callout Button One Label Setting	 
		    $wp_customize->add_setting(
		    	'financeup_callout_button_one_label', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
		    ) );	
		    $wp_customize->add_control( 
		    	'financeup_callout_button_one_label', array(
		    	'label'   => __('Button One Title','financeup'),
		    	'section' => 'financeup_callout_section_settings',
		    	'type' => 'text',
		    ) );	

		    //Callout Button One Link Setting	
		    $wp_customize->add_setting(
		    	'financeup_callout_button_one_link', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'esc_url_raw',
		    ) );	
		    $wp_customize->add_control( 
		    	'financeup_callout_button_one_link',array(
		    	'label'   => __('Button One URL','financeup'),
		    	'section' => 'financeup_callout_section_settings',
		    	'type' => 'text',
		    ) );	

		    //Callout Button One Target Setting	
		    $wp_customize->add_setting(
		    	'financeup_callout_button_one_target', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'financeup_homepage_sanitize_checkbox',
		    ) );	
		    $wp_customize->add_control( 
		    	'financeup_callout_button_one_target',array(
		    	'label'   => __('Open Link New window','financeup'),
		    	'section' => 'financeup_callout_section_settings',
		    	'type' => 'checkbox',
		    ) );

		    //Callout Button Two Label Setting	
		    $wp_customize->add_setting(
		    	'financeup_callout_button_two_label', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
				
		    ) );	
		    $wp_customize->add_control( 
		    	'financeup_callout_button_two_label', array(
		    	'label'   => __('Button Two Title','financeup'),
		    	'section' => 'financeup_callout_section_settings',
		    	'type' => 'text',
		    ) );	

		    //Callout Button Two Link Setting
		    $wp_customize->add_setting(
		    	'financeup_callout_button_two_link', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'esc_url_raw',
		    ) );	
		    $wp_customize->add_control( 
		    	'financeup_callout_button_two_link', array(
		    	'label'   => __('Button Two URL','financeup'),
		    	'type' => 'text',
		    	'section' => 'financeup_callout_section_settings',
		    ) );	

		    //Callout Button Two Target Setting
		    $wp_customize->add_setting(
		    	'financeup_callout_button_two_target', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'financeup_homepage_sanitize_checkbox',
		    ) );	
		    $wp_customize->add_control( 
		    	'financeup_callout_button_two_target', array(
		    	'label'   => __('Open Link New window','financeup'),
		    	'section' => 'financeup_callout_section_settings',
		    	'type' => 'checkbox',
		    ) );
		    

		    /* --------------------------------------
		    =========================================
		    Latest News Section
		    =========================================
		    -----------------------------------------*/
		    // add section to manage Latest News
		    $wp_customize->add_section(
		    	'news_section_settings', array(
		        'title' => __('News & Events Setting','financeup'),
		        'description' => '',
		        'panel'  => 'homepage_setting'
		    ) );

            //Enable news
            $wp_customize->add_setting(
                'financeup_news_enable', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'financeup_homepage_sanitize_checkbox',
            ) );    
            $wp_customize->add_control( 
                'financeup_news_enable', array(
                'label'   => __('Enable News Section','financeup'),
                'section' => 'news_section_settings',
                'type' => 'checkbox',
            ) );

		    //Latest News Background Image
		    $wp_customize->add_setting( 
		    	'news_background', array(
		    	'sanitize_callback' => 'financeup_sanitize_image',
		    ) );
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
		    	'news_background', array(
		    	'label'    => __( 'Choose Background Image', 'financeup' ),
		    	'section'  => 'news_section_settings',
		    	'settings' => 'news_background', ) 
		    ) );

		   
		   $wp_customize->add_setting(
		    	'financeup_overlay_news_color_control', array(
				'sanitize_callback' => 'sanitize_text_field',
				
		    ) );	
            
            $wp_customize->add_control(new Financeup_Customize_Alpha_Color_Control( $wp_customize,'financeup_overlay_news_color_control', array(
               'label'      => __('Choose Background Overlay Color', 'financeup' ),
                'palette' => true,
                'section' => 'news_section_settings')
            ) );
			
			
		   
		   
			// Latest News Title Setting
		    $wp_customize->add_setting(
		    	'financeup_news_title', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'financeup_homepage_sanitize_text',
		    ) );	
		    $wp_customize->add_control( 
		    	'financeup_news_title',array(
		    	'label'   => __('Latest News Title','financeup'),
		    	'section' => 'news_section_settings',
		    	'type' => 'text',
		    ) );

		    // Latest News Subtitle Setting
		    $wp_customize->add_setting(
		    	'financeup_news_subtitle', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'financeup_homepage_sanitize_text',
		    ) );  
		    $wp_customize->add_control( 
		    	'financeup_news_subtitle',array(
		    	'label'   => __('Latest News Subtitle','financeup'),
		    	'section' => 'news_section_settings',
		    	'type' => 'textarea',
		    ) );
			
			
	function financeup_homepage_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

	}
	
	
	function financeup_homepage_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
	function financeup_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}
}
add_action( 'customize_register', 'financeup_homepage_setting' );
?>